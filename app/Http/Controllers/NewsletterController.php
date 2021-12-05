<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use MailchimpMarketing\ApiClient;
use MailchimpMarketing\ApiException;

class NewsletterController extends Controller
{
    public function subscribe(){
        try {
            $newsletter = new Newsletter();
            $newsletter->subscribe(request('email'));
        } catch (\Exception $err) {
            return redirect('/')->with('success','Failed!');
        }

        return redirect('/')->with('success','Subscribed successfully!');
    }
}
