<?php

namespace App\Http\Controllers;

use App\Services\GoogleService;
use Illuminate\Http\Request;

class GoogleServiceGmailController extends Controller
{
    private $googleService;

    public function __construct(GoogleService $googleService)
    {
        $this->googleService = $googleService;
    }

    public function listEmails(Request $request)
    {
        $accessToken = $request->session()->get('access_token');
        $emails = $this->googleService->listEmails($accessToken);

        return view('emails.list', ['emails' => $emails]);
    }

    public function viewEmail(Request $request, $id)
    {
        $accessToken = $request->session()->get('access_token');
        $email = $this->googleService->viewEmail($accessToken, $id);

        return view('emails.view', ['email' => $email]);
    }

    public function sendEmail(Request $request)
    {
        $accessToken = $request->session()->get('access_token');
        $to = $request->input('to');
        $subject = $request->input('subject');
        $body = $request->input('body');

        $this->googleService->sendEmail($accessToken, $to, $subject, $body);

        return redirect()->route('emails.list')->with('success', 'Email đã được gửi thành công.');
    }

    public function deleteEmail(Request $request, $id)
    {
        $accessToken = $request->session()->get('access_token');
        $this->googleService->deleteEmail($accessToken, $id);

        return redirect()->route('emails.list')->with('success', 'Email đã được xóa thành công.');
    }
}

