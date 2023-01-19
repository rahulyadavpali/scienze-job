<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Stripe;

class StripeController extends Controller
{
    public function stripe()
    {
        $metaTitle = 'Stripe Payment | Home';
        $metaDescription = 'Stripe Payment | Home page of Prize Pool.';

        return view('front.pages.stripe', compact('metaTitle', 'metaDescription'));
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $fees = $request->fee;

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $fees * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "This payment is tested purpose phpcodingstuff.com"
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }

}
