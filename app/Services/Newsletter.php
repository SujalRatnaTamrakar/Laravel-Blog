<?php


namespace App\Services;


use MailchimpMarketing\ApiClient;
use MailchimpMarketing\Configuration;

class Newsletter
{
    public function subscribe(string $email){
        request()->validate(['email' => 'required|email']);
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us7'
        ]);

        $list_id = config('services.mailchimp.list_key');

        return $mailchimp->lists->addListMember($list_id, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }
}
