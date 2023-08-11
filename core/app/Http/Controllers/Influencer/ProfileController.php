<?php

namespace App\Http\Controllers\Influencer;

use Google\Client;
use Google_Client;
use App\Models\Order;
use App\Models\Service;
use App\Models\Influencer;
use App\Models\SocialLink;
use App\Models\ProjectLink;
use App\Models\Social; 
use Google\Service\YouTube;
use Google_Service_YouTube;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Models\InfluencerEducation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\InfluencerQualification;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller {

    public function profile() {
        $pageTitle    = "Profile Setting";
        $influencer   = Influencer::where('id', authInfluencerId())->with('education', 'qualification', 'socialLink', 'categories')->firstOrFail();
        
        $languageData = config('languages');
        $countries    = json_decode(file_get_contents(resource_path('views/partials/country.json')));

        $data['ongoing_orders']   = Order::inprogress()->where('influencer_id', $influencer->id)->count();
        $data['completed_orders'] = Order::completed()->where('influencer_id', $influencer->id)->count();
        $data['pending_orders']   = Order::pending()->where('influencer_id', $influencer->id)->count();
        $data['total_services']   = Service::where('status', 1)->where('influencer_id', $influencer->id)->count();

        return view($this->activeTemplate . 'influencer.profile_setting', compact('pageTitle', 'influencer', 'countries', 'data', 'languageData'));
    }

    public function submitProfile(Request $request) {
        $request->validate([
            'firstname'  => 'required|string',
            'lastname'   => 'required|string',
            'profession' => 'nullable|max:40|string',
            'summary'    => 'nullable|string',
            'image'      => ['nullable', 'image', new FileTypeValidate(['jpeg', 'jpg', 'png'])],
        ], [
            'firstname.required' => 'First name field is required',
            'lastname.required'  => 'Last name field is required',
        ]);

        $influencer = authInfluencer();

        if ($request->hasFile('image')) {
            try {
                $old               = $influencer->image;
                $influencer->image = fileUploader($request->image, getFilePath('influencerProfile'), getFileSize('influencerProfile'), $old);
            } catch (\Exception$exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }

        }

        $influencer->firstname = $request->firstname;
        $influencer->lastname  = $request->lastname;

        $influencer->address = [
            'address' => $request->address,
            'state'   => $request->state,
            'zip'     => $request->zip,
            'country' => @$influencer->address->country,
            'city'    => $request->city,
        ];

        $influencer->profession = $request->profession;
        $influencer->summary    = nl2br($request->summary);

        if ($request->category) {
            $categoriesId = $request->category;
            $influencer->categories()->sync($categoriesId);
        }

        $influencer->save();
        $notify[] = ['success', 'Profile updated successfully'];
        return back()->withNotify($notify);
    }

    public function submitSkill(Request $request) {

        $request->validate([
            "skills"   => "nullable|array",
            "skills.*" => "required|string",
        ]);

        $influencer         = authInfluencer();
        $influencer->skills = $request->skills;
        $influencer->save();

        $notify[] = ['success', 'Skill added successfully'];
        return back()->withNotify($notify);
    }

    public function addLanguage(Request $request) {

        $request->validate([
            'name'      => 'required|string|max:40',
            'listening' => 'required|in:Basic,Medium,Fluent',
            'speaking'  => 'required|in:Basic,Medium,Fluent',
            'writing'   => 'required|in:Basic,Medium,Fluent',
        ]);

        $influencer   = authInfluencer();
        $oldLanguages = authInfluencer()->languages ?? [];

        $addedLanguages = array_keys($oldLanguages);

        if (in_array(strtolower($request->name), array_map('strtolower', $addedLanguages))) {
            $notify[] = ['error', $request->name . ' already added'];
            return back()->withNotify($notify);
        }

        $newLanguage[$request->name] = [
            'listening' => $request->listening,
            'speaking'  => $request->speaking,
            'writing'   => $request->writing,
        ];

        $languages = array_merge($oldLanguages, $newLanguage);

        $influencer->languages = $languages;
        $influencer->save();

        $notify[] = ['success', 'Language added successfully'];
        return back()->withNotify($notify);
    }

    public function removeLanguage($language) {
        $influencer     = authInfluencer();
        $oldLanguages   = $influencer->languages ?? [];
        $addedLanguages = array_keys($oldLanguages);

        if (in_array($language, $addedLanguages)) {
            unset($oldLanguages[$language]);
        }

        $influencer->languages = $oldLanguages;
        $influencer->save();

        $notify[] = ['success', 'Language removed successfully'];
        return back()->withNotify($notify);
    }

    public function addSocialLink(Request $request, $id=0) {
        $request->validate([
            'social_icon' => 'required',
            'url'         => 'required',
            'followers'   => 'required|string|max:40',            
        ]);

        $influencerId = authInfluencerId();

        if ($id) {
            $social       = SocialLink::where('influencer_id', $influencerId)->findOrFail($id);
            $notification = 'Social link updated successfully';
        } else {
            $social                = new SocialLink();
            $social->influencer_id = $influencerId;
            $notification          = 'Social link added successfully';
        }

        $social->social_media = $request->social_media;
        $media =Social::where('id',$social->social_media)->first();
        $social->social_media_name = $media->name;
      
        $social->social_icon = $request->social_icon;
        $social->url         = $request->url;
        $social->followers   = $request->followers;
        //dd($social);
        $social->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }

    public function removeSocialLink($id) {
        $influencerId = authInfluencerId();
        SocialLink::where('influencer_id', $influencerId)->findOrFail($id)->delete();
        $notify[] = ['success', 'Social link removed successfully'];
        return back()->withNotify($notify);
    }


    public function projLink(Request $request ,$id=0) {
        $request->validate([
           'thumbnail'   => 'required',
          //  'thumbnail'      => ['nullable', 'image', new FileTypeValidate(['jpeg', 'jpg', 'png'])],
            'proj_url'    => 'required',                       
        ]);

       // $influencerId = authInfluencerId();

        /*if ($id) {
            $social       =  ProjectLink::findOrFail($id);
            $notification = 'Social link updated successfully';
        } else {
            $social                = new ProjectLink();
            $social->influencer_id = $influencerId;
            $social->sociallink_id = $id;
            $notification          = 'Social link added successfully';
        }*/

        $social                = new ProjectLink();
        $social->influencer_id = $request->influencer_id;
        $social->sociallink_id = $request->sociallink_id;
        // $social->thumbnail     = $request->thumbnail;
        $social->proj_url      = $request->proj_url;     
       
        //$social->save();
        if($request->hasfile('thumbnail'))
        {
           $image_file = $request->file('thumbnail');
           $img_extension = $image_file->getClientOriginalExtension();
           $img_filename = time().'.'.$img_extension;
           $image_file->move('assets/images/thumbnail/',$img_filename);          
           $social->thumbnail = $img_filename;      
     
        }

        /*if ($request->hasFile('thumbnail')) {
            try {
                $old               = $social->thumbnail;
                $social->thumbnail = fileUploader($request->image, getFilePath('influencerThumbnail'), getFileSize('influencerThumbnail'), $old);
            } catch (\Exception$exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }

        }*/

        $social->save();
        
        $notification   = 'Project link added successfully';
        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }


    public function editprojLink($id, Request $request)
    {
        $request->validate([
            'thumbnail'   => 'required',
            'proj_url'    => 'required',                       
        ]);

        $social                = ProjectLink::find($id);
        // $social->thumbnail     = $request->thumbnail;
        $social->proj_url      = $request->proj_url;     

        
        
        if($request->hasfile('thumbnail'))
        {
           $filepath_img = 'assets/images/thumbnail/'.$social->thumbnail;
            if(File::exists($filepath_img))
            {
                File::delete($filepath_img);
            }
           $image_file = $request->file('thumbnail');
           $img_extension = $image_file->getClientOriginalExtension();
           $img_filename = time().'.'.$img_extension;
           $image_file->move('assets/images/thumbnail/',$img_filename);
           $social->thumbnail = $img_filename;
        }

        $social->save();
        

        $notification    = 'Project updated successfully';
        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }



    public function removeProjLink($id) 
    {        
        $social = ProjectLink::find($id);
        $filepath_file = 'assets/images/thumbnail/'.$social->thumbnail;
        if(File::exists($filepath_file))
        {
            File::delete($filepath_file);
        }    
        ProjectLink::where("id", $social->id)->delete();

        $notification          = 'Project deleted successfully';
        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }


    public function changePassword() {
        $pageTitle = 'Change Password';
        return view($this->activeTemplate . 'influencer.password', compact('pageTitle'));
    }



    public function addEducation(Request $request, $id = 0) {

        $request->validate([
            'country'    => 'required|string',
            'institute'  => 'required|string',
            'degree'     => 'required|string',
            'start_year' => 'required|date_format:Y',
            'end_year'   => 'required|date_format:Y|after_or_equal:start_year',
        ]);

        $influencerId = authInfluencerId();

        if ($id) {
            $education    = InfluencerEducation::where('influencer_id', $influencerId)->findOrFail($id);
            $notification = 'Education updated successfully';
        } else {
            $education                = new InfluencerEducation();
            $education->influencer_id = $influencerId;
            $notification             = 'Education added successfully';
        }

        $education->country    = $request->country;
        $education->institute  = $request->institute;
        $education->degree     = $request->degree;
        $education->start_year = $request->start_year;
        $education->end_year   = $request->end_year;
        $education->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }



    public function removeEducation($id) {
        $influencerId = authInfluencerId();
        InfluencerEducation::where('influencer_id', $influencerId)->where('id', $id)->delete();
        $notify[] = ['success', 'Education remove successfully'];
        return back()->withNotify($notify);
    }



    public function addQualification(Request $request, $id = 0) {
        $request->validate([
            'certificate'  => 'required|string',
            'organization' => 'required|string',
            'summary'      => 'nullable|string',
            'year'         => 'required|date_format:Y',
        ]);

        $influencerId = authInfluencerId();

        if ($id) {
            $education    = InfluencerQualification::where('influencer_id', $influencerId)->findOrFail($id);
            $notification = 'Qualification updated successfully';
        } else {
            $education                = new InfluencerQualification();
            $education->influencer_id = $influencerId;
            $notification             = 'Qualification added successfully';
        }

        $education->certificate  = $request->certificate;
        $education->organization = $request->organization;
        $education->summary      = $request->summary;
        $education->year         = $request->year;
        $education->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }



    public function removeQualification($id) {
        $influencerId = authInfluencerId();
        InfluencerQualification::where('influencer_id', $influencerId)->where('id', $id)->delete();
        $notify[] = ['success', 'Qualification remove successfully'];
        return back()->withNotify($notify);
    }



    public function submitPassword(Request $request) {

        $passwordValidation = Password::min(6);
        $general            = gs();

        if ($general->secure_password) {
            $passwordValidation = $passwordValidation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        $this->validate($request, [
            'current_password' => 'required',
            'password'         => ['required', 'confirmed', $passwordValidation],
        ]);

        $user = authInfluencer();

        if (Hash::check($request->current_password, $user->password)) {
            $password       = Hash::make($request->password);
            $user->password = $password;
            $user->save();
            $notify[] = ['success', 'Password changes successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'The password doesn\'t match!'];
            return back()->withNotify($notify);
        }

    }



    public function test()
    {
        // $f = 'hhh';
        // dd($f);
        // return view('influencer.test');

    }


    public function redirectToGoogle(Request $request)
    {
        // $f = 'hhh';
        // dd($f);
        
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
                 
           // dd($channel);

            $title = $channel->getSnippet()->getTitle();
                        
            \App\Models\SocialLink::updateOrCreate(
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



    //twitter
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }
          

    public function handleTwitterCallback()
    {
        // try {
        
            $user = Socialite::driver('twitter')->user();
            $u = $user->user;  
            
            // $d = $u['followers_count'];
            //dd($d);  
            dd($user);  

            // $finduser = User::where('twitter_id', $user->id)->first();
         
            // if($finduser){         
            //     Auth::login($finduser);        
            //     return redirect()->intended('dashboard');
         
            // }else{
                $newUser = SocialLink::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        // 'twitter_id'=> $user->id,                       
                        'follower' => $u['followers_count'],
                        'influencer_id' => authInfluencerId(),
                    ]);
        
        //         Auth::login($newUser);
        
                 return redirect()->intended('dashboard');
        //     }
        
        // } catch (Exception $e) {
        //     dd($e->getMessage());
        // }
    }


}
