<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class redditAuthController extends Controller
{

    private $clientID = 'lA5B2H5N7eB5vLyrWMp5Hw';
    private $clientSecret = '02hWwt2A0dmlnuI6Uwx88o6wDNpsHQ';
    private $redirectURL = 'http://127.0.0.1:8000/api/loginCallback';
    private $bearerToken = '';

    function returnRedditLoginURL()
    {
        echo 'https://www.reddit.com/api/v1/authorize?client_id=' . $this->clientID . '&response_type=code&
           state=test&redirect_uri=' . $this->redirectURL . '&duration=permanent&scope=save,submit,identity';
    }

    function getBearerToken()
    {
        if (isset($_GET['error'])) {
            return json_encode(['error', 'Geen toegang verleent.']);
        }

        $client = new Client([
            'verify'  => false,
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($this->clientID . ':' . $this->clientSecret),
            ],
        ]);
        $res    = $client->request('POST', 'https://www.reddit.com/api/v1/access_token', [
            'application/x-www-form-urlencoded' => [
                'grant_type'   => 'authorization_code',
                'code'         => $_GET['code'],
                'redirect_uri' => $this->redirectURL,
            ],
        ]);

        if($res->getStatusCode() === 200){
        }
    }
}
