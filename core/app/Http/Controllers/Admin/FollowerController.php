<?php

namespace App\Http\Controllers\Admin;

use App\Models\Follower;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowerController extends Controller
{
    public function index(Request $request) {
        $pageTitle  = 'Follower Count';
        $follower = Follower::query();

        if ($request->search) {
            $follower->where('name', 'LIKE', "%$request->search%");
        }

        $follower = $follower->latest()->paginate(getPaginate());
        return view('admin.follower.index', compact('pageTitle', 'follower'));
    }


    public function store(Request $request, $id = 0) {

        $validate = [
            'name'  => 'required|regex:/^[a-zA-Z]+$/u|max: 40|unique:socials,name,'.$id,
            // 'max'   => 'required|numeric|min:2|max:15',
            // 'min'   => 'numeric|min:0|max:15',

        ];

        $request->validate($validate);

        if($id == 0){
            $follower = new Follower();
            $notification = 'Added successfully.';
        }else{
            $follower = Follower::findOrFail($id);
            // $social->status   = $request->status ? 1 : 0;
            $notification = 'Updated successfully';
        }

        $follower->name = $request->name;
        $follower->min = $request->min;
        $follower->max = $request->max;

        //dd($follower);
        $follower->save();

        $notify[] = ['success', $notification];
        return back()->withNotify($notify);
    }
}
