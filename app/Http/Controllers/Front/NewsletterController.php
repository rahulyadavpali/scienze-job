<?php

namespace App\Http\Controllers\Front;

use Auth;
use App\Emails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class NewsletterController extends Controller
{
    public function subscribe(Request $request, $id)
    {
        $data = Emails::find($id);
        $data->agree_id = 1;
        $data->save();

        return redirect()->route('auth.user');
    }

    public function unsubscribe(Request $request, $id)
    {
        $data = Emails::find($id);
        $data->agree_id = 2;
        $data->save();

        return redirect()->route('auth.user');
    }

}
