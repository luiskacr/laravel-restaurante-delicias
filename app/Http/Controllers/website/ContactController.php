<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    /**
     * Display a Contact View
     *
     * @return View
     */
    public function index():View
    {
        return view('website.Contact');
    }

    /**
     * Store a Contact Information
     *
     * @param ContactRequest $request
     * @return RedirectResponse
     */
    public function store(ContactRequest $request):RedirectResponse
    {
        $contacto = new Contact();
        $contacto->name = $request->post('name');
        $contacto->email = $request->post('email');
        $contacto->telephone = $request->post('telephone');
        $contacto->message = $request->post('message');
        $contacto->save();

        return response()
            ->redirectToRoute('website.contact')
            ->with('success_message', '¡Gracias por contactarnos! Tu mensaje ha sido enviado correctamente.');

    }
}
