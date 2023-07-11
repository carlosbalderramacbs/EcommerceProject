<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
class MailController extends Controller
{
    public function sendEmail()
    {
        $details=  [
            'title' => 'Correo de julios.store',
            'body' => 'Este es un correo de prueba'
        ];

        /* Mail::to("informacion@julios.store")->send(new TestMail($details)); */
        $mail = Auth::user()->mail;
        Mail::to(Auth::user()->email)->send(new TestMail($details));
        /* return redirect('/paypal/pay'); */
    }
}
