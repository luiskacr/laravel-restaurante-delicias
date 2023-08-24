<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscribeController extends Controller
{
    /**
     * Insert the email on Subscribe table.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request):JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email|max:200',
        ]);

        $subscribe = Subscribe::where('email', '=',$validated['email'] )->get();
        if($subscribe != null)
        {
            return response()->json(['message' => 'ok'],406);
        }

        DB::beginTransaction();
        try{

            Subscribe::create([
                'email' => $validated['email'],
            ]);

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            return response()->json(['message' => $e->getMessage()],500);
        }
        return response()->json(['message' => 'ok']);
    }
}
