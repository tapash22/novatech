<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contacts;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Mail;

//use Mail;


class ContactController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=> 'required|email',
            'phone'=> 'required|email',
            'subject'=> 'required',
            'des'=> 'required'
        ]);

        $mail_data =[
            "recipient"=>"tapasp263@gmail.com",
            "fromEmail"=>$request->email,
            "subject"=>$request->subject,
            "body"=>$request->des,
        ];

       Mail::send('contact-form', $mail_data, function ($message) use ($mail_data){
            $message->to($mail_data['recipient'])
            ->from($mail_data['fromEmail'], $mail_data['name'])
            ->subject($mail_data['subject']);
        });

    
        return back()->with(['success' => 'Contact Form Submit Successfully']); 
    }
}
