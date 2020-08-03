<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\MessageBag;

class ContactFormController extends Controller
{

    public function create() {
        $menu_active = 3;
        return view('contact',compact('menu_active'));
    }

    public function store() {
        $menu_active = 3;
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $message_success = 'Mesajul a fost trimis. Va vom contacta in cel mai scurt timp posibil.';

        // Send An Email
        Mail::to('test@test.com')->send(new ContactFormMail($data));

        return back()->with('message_success', $message_success);

    }
}
