<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendemail()
    {
        $recipient = 'recipient@example.com';
        $email = new ContactMail($recipient);
        Mail::to($recipient)->send($email);
    }
}
