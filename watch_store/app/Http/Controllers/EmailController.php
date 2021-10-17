<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeFormValidationRequest;
use App\Mail\ContactMail;
use App\Mail\MailSubscribe;
use App\Models\ContactUs;
use App\Models\EmailSubscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public function subscribeMail(SubscribeFormValidationRequest $request){
        
        $emails = new EmailSubscribe();
        $emails->email = $request->subscribe_email;
        $emails->save();
        
        Mail::to($request->subscribe_email)->send(new MailSubscribe());

        return redirect()->back();
    }

    public function contactMail(Request $request){

        $contact_us = new ContactUs();
        $contact_us->contact_name = $request->contact_name;
        $contact_us->contact_email = $request->contact_email;
        $contact_us->contact_subject = $request->contact_subject;
        $contact_us->contact_message = $request->contact_message;

        // dd($contact_us);
        $contact = $request->all();

        Mail::to($request->contact_email)->send(new ContactMail($contact));
        // $contact_us->save();

        return redirect()->back();
    }
}
