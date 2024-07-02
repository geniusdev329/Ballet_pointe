<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'content' => 'required',
            ],
            [
                'name.required' => '名前を入力してください。',
                'email.required' => 'メールアドレスを入力してください。',
                'content.required' => '内容を入力してください。',
            ]
        );

        Mail::to(config('mail.admin_email'))->send(new ContactFormMail($validated));

        return back()->with('success', 'Thank you for your message. We\'ll get back to you soon!');

    }
}
