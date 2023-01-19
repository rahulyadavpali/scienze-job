<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialShareButtonsController extends Controller
{
    public function ShareWidget()
    {
        $shareComponent = \Share::page(
            'https://makitweb.com/how-to-upload-multiple-files-with-vue-js-and-php/'
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()
        ->reddit();

        return view('posts', compact('shareComponent'));
    }
}
