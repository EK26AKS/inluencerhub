<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialLink;
use App\Models\ProjectLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialProjectController extends Controller
{
    public function index($id) {
        $pageTitle  = 'All SocialProject';
        $social = SocialLink::where('influencer_id',$id)->get();

        // $social = $soc->latest()->paginate(getPaginate());
        //dd($social);
        return view('admin.sociallink.list', compact('pageTitle', 'social'));
    }

    public function details($id)
    {
        $pageTitle  = 'All SocialProject';
        $project = ProjectLink::where('sociallink_id',$id)->get();

        // $social = $soc->latest()->paginate(getPaginate());
        //dd($project);
        return view('admin.sociallink.detail', compact('pageTitle', 'project'));

    }
}
