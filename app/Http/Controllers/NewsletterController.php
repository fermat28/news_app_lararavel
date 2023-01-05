<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function storeNewUser(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email|unique:newsletters',
        // ]);
        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->save();
        $details = [
            'title' => 'Mail from fermat to confirm your subscription',
            'body' => 'This is for testing email using smtp'
        ];

        Mail::to($request->email)->send(new MyTestMail($details));
        return redirect("/");
    }
}
