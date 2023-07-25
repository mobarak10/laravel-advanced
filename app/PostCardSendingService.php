<?php

namespace App;

use Illuminate\Support\Facades\Mail;

class PostCardSendingService
{
    private $country;
    private $width;
    private $height;

    public function __construct($country, $width, $height)
    {
        $this->country = $country;
        $this->width = $width;
        $this->height = $height;
    }

    public function hello($message, $email)
    {
        Mail::raw($message, function ($message) use ($email) {
            $message->to($email);
        });

        // Mail out postcard though some service
        // $this->>country
        // $this->>width
        // $this->>height

        dump('Postcard was sent with the message: '. $message);
    }
}