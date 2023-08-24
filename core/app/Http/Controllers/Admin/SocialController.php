<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social;


class SocialController extends Controller
{
    public function index(Request $request) {
        $pageTitle  = 'All Social';
        $social = Social::query();

        if ($request->search) {
            $social->where('name', 'LIKE', "%$request->search%");
        }

        $social = $social->latest()->paginate(getPaginate());
        return view('admin.social.index', compact('pageTitle', 'social'));
    }


    public function store(Request $request, $id = 0) {

        $validate = [
            'name'  => 'required|regex:/^[a-zA-Z]+$/u|max: 40|unique:socials,name,'.$id,
        ];

        $request->validate($validate);

        if($id == 0){
            $social = new Social();
            $notification = 'Social media added successfully.';
        }else{
            $social = Social::findOrFail($id);
            $social->status   = $request->status ? 1 : 0;
            $notification = 'Updated successfully';
        }

        $social->name = $request->name;
        // dd($social);
        $social->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }
}
