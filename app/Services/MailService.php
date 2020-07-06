<?php

namespace App\Services;

use App\Jobs\SendEmail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendNotification($subject, $message, $email)
    {
        return dispatch(new SendEmail($subject, $message, $email));
    }
}
