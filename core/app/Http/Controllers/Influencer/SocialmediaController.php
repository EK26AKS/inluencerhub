<?php

namespace App\Http\Controllers;

use Google_Client;
use SimpleXMLElement;
use Google_Service_YouTube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{

    public function store(Request $request)
    {
       $channelName = $request->channelName;
       // dd($channelName);
       // session()->put('key' => $channelName);
       Session::put('key', $channelName);
       // session(['key' => 'channelName']);
       // dd($ss);


    //    $client = new Google_Client();
    //    $client->setClientId(env('GOOGLE_CLIENT_ID'));
    //    $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
    //    $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
    //    $client->setScopes([Google_Service_YouTube::YOUTUBE_READONLY]);
    //    $client->setAccessType('offline');
    //    $client->setApprovalPrompt('force');

    //    return redirect()->away($client->createAuthUrl());
    return redirect()->route('google');


    }
    
    public function redirectToGoogle(Request $request)
    {
        // $channelName = $request->channelName;
        // Session::put('key', $channelName);

        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->setScopes([Google_Service_YouTube::YOUTUBE_READONLY]);
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');

        return redirect()->away($client->createAuthUrl());
    }

    public function handleGoogleCallback(Request $request)
    {
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->setScopes([Google_Service_YouTube::YOUTUBE_READONLY]);
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');

        if ($request->get('code')) {
            $token = $client->fetchAccessTokenWithAuthCode($request->get('code'));
            $client->setAccessToken($token);
   
            $youtube = new Google_Service_YouTube($client);           
            $channel = $youtube->channels->listChannels('snippet,statistics', ['mine' => true])->getItems()[0];
                           
            $title = $channel->getSnippet()->getTitle();
                        
                \App\Models\YoutubeChannel::updateOrCreate(
                    [   'channel_id' => $channel->getId()  ],
                    [
                        'title' => $channel->getSnippet()->getTitle(),
                        // 'custom_url'=> $channel->getSnippet()->getCustomUrl(),
                        'follower' => $channel->getStatistics()->getsubscriberCount(),
                        'influencer_id' => authInfluencerId(),
                        // 'description' => $channel->getSnippet()->getDescription(),
                        // 'thumbnail' => $channel->getSnippet()->getThumbnails()->getDefault()->getUrl(),
                    ]
                );

        }   
        return redirect('/')->with('success', 'YouTube channel details saved successfully!');
    }


  
}
