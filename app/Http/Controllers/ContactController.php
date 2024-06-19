<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{

    public function showForm()
    {
        return view('emails.contact');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];


        Mail::to('jomacamu23@gmail.com')->send(new ContactMail($data));

        return redirect()->back()->with('success', '¡El mensaje ha sido enviado correctamente!');
    }
}
