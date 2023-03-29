<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class redditAuthController extends Controller
{

    private $clientID = 'lA5B2H5N7eB5vLyrWMp5Hw';
    private $clientSecret = 'oIcgBI52nAkavZB0PXYSOKvEgPWI2A';
    private $redirectURL = 'http://127.0.0.1:8000/api/loginCallback';

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

        var_dump($_GET['code']); echo '<br>';
        var_dump($this->clientID); echo '<br>';
        var_dump($this->clientSecret); echo '<br>';
        var_dump($this->redirectURL); echo '<br>';
//        $client = new Client([
//            'verify'  => false,
//            'headers' => [
//                'Authorization' => 'Basic ' . base64_encode($this->clientID . ':' . $this->APISecret),
//            ],
//        ]);
//        $res    = $client->request('POST', 'https://www.reddit.com/api/v1/access_token', [
//            'application/x-www-form-urlencoded' => [
//                'grant_type'   => 'authorization_code',
//                'code'         => $_GET['code'],
//                'redirect_uri' => $this->redirectURL,
//            ],
//        ]);
//
//        return $res->getStatusCode();
    }
}
