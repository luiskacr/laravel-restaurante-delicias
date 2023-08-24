<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinishOrderRequest;
use App\Models\Canton;
use App\Models\Client;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Province;
use Carbon\Carbon;
use Darryldecode\Cart\Cart;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    /**
     * Display a Cart View
     *
     * @return View
     */
    protected function showCart():View
    {
        return view('website.cart');
    }

    /**
     * Add an item on the shopping cart
     *
     * @param Request $request
     * @return RedirectResponse
     */
    function addItemToCart(Request $request):RedirectResponse
    {
        $product = Product::findOrFail($request->get('id'));

        \Cart::add(array(
            'id'=> $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->get('quantity'),
            'attributes' => array(
                'image' => $product->image,
            ),
            'associatedModel' => $product
        ));

        return Redirect::back();
    }

    /**
     * Update a Product on the shopping cart
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updateProduct(Request $request):JsonResponse
    {
        try {
            \Cart::update($request->request->getInt('id'), array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->request->getInt('quantity')
                ),
            ));
        }catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()],500);
        }
        return response()->json(['message' => 'ok']);
    }

    /**
     * Delete a item on the shopping cart
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function deleteItemToCart(int $id):RedirectResponse
    {
       \Cart::remove($id);
        return Redirect::back();
    }

    /**
     * Display the Checkout View if the shopping cart is empty redirects to shopping cart view
     *
     * @return View|RedirectResponse
     */
    public function checkOut():View|RedirectResponse
    {
        return \Cart::isEmpty()
            ? redirect()->route('cart.show')
            : view('website.checkout')
                ->with('provinces', Province::all())
                ->with('cantons', Canton::all())
                ->with('districts', District::all());
    }


    /**
     * Create a client, order and his details and Finish the Shopping cart process.
     *
     * @param FinishOrderRequest $request
     * @return RedirectResponse
     */
    public function finishOrder(FinishOrderRequest $request):RedirectResponse
    {
        DB::beginTransaction();
        try {

            $client = Client::where('email', '=', $request->get('email') )->first();

            if($client == null){
                $client = Client::create([
                    'name' => $request->get('firstName'),
                    'lastname' => $request->get('lastname'),
                    'email' => $request->get('email') ,
                    'address1' => $request->get('address1'),
                    'address2' => $request->get('address2') ,
                    'district' => $request->get('district'),
                ]);
            }else{
                $client->name = $request->get('firstName');
                $client->lastname = $request->get('lastname');
                $client->address1 = $request->get('address1');
                $client->address2 = $request->get('address2');
                $client->district = $request->get('district');
                $client->save();
            }

            $cleanedNumber = preg_replace('/[^0-9]/', '', $request->get('cc-number'));
            $maskedNumber = substr_replace($cleanedNumber, ' XXXX XXXX ', 4, 8);

            $order = Order::create([
                'client' => $client->id,
                'date' => Carbon::now('America/Costa_Rica')->format('Y-m-d'),
                'payment_type' => $request->request->getBoolean('cash')  == null ? 1 : 2  ,
                'cart_name' =>$request->get('cc-name') ,
                'cart_number' =>$maskedNumber,
                'cart_expiration' => $request->get('cc-expiration') ,
                'subTotal' => \Cart::getSubTotal(),
                'taxes' => \Cart::getSubTotal() * 0.13,
                'total' => (\Cart::getSubTotal() + (\Cart::getSubTotal() * 0.13)),
            ]);

            foreach(\Cart::getContent() as $product)
            {
                OrderDetail::create([
                    'order' => $order->id,
                    'product' => $product->id ,
                    'quantity' => $product->quantity ,
                    'price' => $product->price,
                ]);
            }

            \Cart::clear();

            DB::commit();
            return redirect()->route('cart.thanks', $order->id);
        }catch (\Exception $e){
            DB::rollBack();

            return Redirect::back()->with('error_message', $e->getMessage());
        }
    }

    /**
     * Display a thanks View
     *
     * @param int $id
     * @return View
     */
    public function thanks(int $id):View
    {
        $order = Order::findOrFail($id);

        return view('website.thanks')
            ->with('order', $order)
            ->with('orderDetails', OrderDetail::where('order','=', $order->id)->get());
    }

}
