<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;


class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'content' => 'required',
            ],
            [
                'name.required' => '名前を入力してください。',
                'email.required' => 'メールアドレスを入力してください。',
                'email.email' => '有効なメールアドレスを入力してください',
                'content.required' => '内容を入力してください。',
            ]
        );

        
        return view('frontend/contact-confirm', compact('request'));
    }
    
    public function confirm(Request $request) {

        Mail::to("techguru0411@gmail.com")->send(new ContactFormMail($request));
    
        return back()->with('success', 'Thank you for your message. We\'ll get back to you soon!');
    }
}
