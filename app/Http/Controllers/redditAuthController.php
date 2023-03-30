<?php

namespace App\Http\Controllers;

//use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

use App\Models\User;

use Illuminate\Support\Facades\Redirect;

class redditAuthController extends Controller
{

    private $clientID = 'lA5B2H5N7eB5vLyrWMp5Hw';
    private $clientSecret = '02hWwt2A0dmlnuI6Uwx88o6wDNpsHQ';
    private $redirectURL = 'http://127.0.0.1:8000/api/loginCallback';
    private $bearerToken;
    private $client;

    function returnRedditLoginURL()
    {
        echo 'https://www.reddit.com/api/v1/authorize?client_id=' . $this->clientID . '&response_type=code&
           state=test&redirect_uri=' . $this->redirectURL . '&duration=permanent&scope=save,submit,identity,read';
    }

    function getBearerToken()
    {
        if (isset($_GET['error'])) {
            return json_encode(['error', 'Geen toegang verleent.']);
        }

        $this->client = new Client([
            'verify' => false,
        ]);

        $res      = $this->client->request('POST', 'https://www.reddit.com/api/v1/access_token', [
            'form_params' => [
                'grant_type'     => 'authorization_code',
                'code'           => $_GET['code'],
                'redirect_uri'   => $this->redirectURL,
                'decode_content' => false,
            ],
            'auth'        => [$this->clientID, $this->clientSecret],
            'headers'     => ['Content-type' => 'application/x-www-form-urlencoded'],
        ]);
        $contents = json_decode($res->getBody()->getContents());

        if ($res->getStatusCode() === 200) {
            $this->bearerToken = $contents->access_token;
            if ($this->handleRegistration()) {
                return redirect('/dashboard');
            }
        }
        return false;
    }

    private function handleRegistration()
    {
        $res = $this->client->request('GET', 'https://oauth.reddit.com/api/v1/me', [
            'headers' => ['Content-type' => 'application/json', 'Authorization' => 'Bearer ' . $this->bearerToken],
        ]);

        $contents = json_decode($res->getBody()->getContents());

        if ($res->getStatusCode() === 200) {
            if ($user = User::where('username', $contents->name)->first()) {
                $user->token = $this->bearerToken;
                $user->save();
            } else {
                $user                   = new User();
                $user->username         = $contents->name;
                $user->token            = $this->bearerToken;
                $user->permission_level = 0;
                $user->save();
            }
            $_SESSION['username'] = $contents->name;

            return true;
        }

        return false;
    }
}
