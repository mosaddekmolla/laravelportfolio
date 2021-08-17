<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactPageController extends Controller
{
    function store()
    {
        $contact_form_data = request()->all();
        Mail::to('mosaddek6@gmail.com')->send(new ContactFormMail($contact_form_data));

        return redirect()->route('home', '/#contact')->with('Success', 'Message Has benn Sent Successfully');

    }
}
