<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Oauth2;
use Google\Service\Oauth2\Userinfo;
use App\Http\Controllers\Google_Service_Gmail;

class SocialLoginController extends Controller
{
    public function loginWithGoogle()
    {
        $client = new Client();
        $client->setClientId(env('7231506492-or8tlqrs3nc0dkofv2425h70kibrm4cq.apps.googleusercontent.com'));
        $client->setClientSecret(env('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'));
        $client->setRedirectUri(env('http://localhost:8000/callback'));
        $authUrl = $client->createAuthUrl();

        return redirect($authUrl);
    }

    public function callback()
    {
        $client = new Client();
        $client->setClientId(env('7231506492-or8tlqrs3nc0dkofv2425h70kibrm4cq.apps.googleusercontent.com'));
        $client->setClientSecret(env('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'));
        $client->setRedirectUri(env('http://localhost:8000/callback'));
        $client->setScopes(['https://www.googleapis.com/auth/gmail.readonly']);

        $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        session()->put('access_token', $accessToken);
        $accessToken = session()->get('access_token');

        $client->setAccessToken($accessToken);

        $service = new Google_Service_Gmail($client);

        $results = $service->users->messages->list('me');

        foreach ($results->getMessages() as $message) {
            echo $message->getId() . "\n";
}
        if ($accessToken) {
            $client->setAccessToken($accessToken);

            // Lưu thông tin người dùng vào session hoặc database
            // ...

            return redirect('/index');
        } else {
            return redirect('/login');
        }
    }
}
