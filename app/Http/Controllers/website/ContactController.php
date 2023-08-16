<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('website.Contact');
    }

    public function store(ContactRequest $request)
    {
        $contacto = new Contact();
        $contacto->name = $request->post('name');
        $contacto->email = $request->post('email');
        $contacto->telephone = $request->post('telephone');
        $contacto->message = $request->post('message');
        $contacto->save();

        return response()
            ->redirectToRoute('website.contact')
            ->with('success', '¡Gracias por contactarnos! Tu mensaje ha sido enviado correctamente.');

    }
}
