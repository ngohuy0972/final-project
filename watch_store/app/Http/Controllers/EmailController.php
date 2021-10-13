<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeFormValidationRequest;
use App\Mail\MailSubscribe;
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
}
