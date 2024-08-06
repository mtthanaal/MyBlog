<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post_page()
    {
        return view ('admin.post_page');
    }
    public function add_post(Request $request)
    {
        $user=Auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;



        $post=new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->user_id = $userid;
        $post->name = $name;
        $post->usertype = $usertype;

        $image = $request->image;

        if($image)
        {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('postimage',$imagename);
        $post->image = $imagename;
        }
        


        $post->save();
        return redirect()->back()->with('message','Post Added Successfully');

    }
}