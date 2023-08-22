<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\SurveyRequest;
use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function index()
    {
        return view('website.survey');
    }

    public function create(SurveyRequest $request)
    {
        DB::beginTransaction();
        try {

            Survey::create([
                'name' => $request->get('name'),
                'birthday' => Carbon::parse($request->get('birthday'))->format('Y-m-d'),
                'email'=> $request->get('email') ,
                'place' => $request->get('place'),
                'clean'=> $request->get('clean'),
                'waitress' => $request->get('waitress'),
                'recommendation' => $request->get('recommendation') == 'yes',
                'socialMedia' => $this->socialMedia($request) ,
                'comments' => $request->get('comments'),
            ]);

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error_message', '¡Ups! Hubo un error interno al intentar crearla.');
        }

        return redirect()
            ->back()
            ->with('success_message', '¡Gracias por hacer la encuesta! Esta ha sido enviada correctamente.');
    }

    private function socialMedia(Request $request):array
    {
        $values = [
            $request->input('socialMedia-Facebook'),
            $request->input('socialMedia-Twitter'),
            $request->input('socialMedia-Instagram'),
        ];

        return array_values(array_filter($values, fn($value) => $value !== null));
    }
}
