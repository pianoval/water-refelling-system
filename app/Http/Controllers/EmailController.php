<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendTestEmail()
    {
        $email = env('TEST_EMAIL');

        Mail::to($email)->send(new TestMail());

        return 'Test email sent successfully!';
    }
}
