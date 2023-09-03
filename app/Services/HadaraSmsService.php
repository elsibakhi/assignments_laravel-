<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class HadaraSmsService {

    protected $baseUrl = 'http://smsservice.hadara.ps:4545/SMS.ashx/bulkservice/sessionvalue';
    protected $key ;

    public function __construct($key) {
        $this->key = $key;
    }
    public function sendSMS($type,$to,$message){

      $response = Http::baseUrl($this->baseUrl)->get($type,[
            "apiKey"=>$this->key,
            "to"=>$to,
            "msg"=>$message,
        ]);

        // dd($response->body());
    }


}
