<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\User;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }

    public function add_post(Request $request)
    {
        $user = Auth::user();

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->user_id = $user->id;
        $post->name = $user->name;
        $post->usertype = $user->usertype;

        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('postimage'), $imageName);
            $post->image = $imageName;
        }

        $post->save();
        return redirect()->back()->with('message','Post Added Successfully');
    }

    public function show_post()
    {
        $post = Post::all();
        return view('admin.show_post', compact('post'));
    }

    public function delete_post($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('message','Post Deleted Successfully');
    }

    public function edit_page($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.edit_page', compact('post'));
    }

    public function update_post(Request $request, $id)
    {
        $data = Post::findOrFail($id);
        $data->title = $request->title;
        $data->description = $request->description;

        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('postimage'), $imageName);
            $data->image = $imageName;
        }

        $data->save();
        return redirect()->back()->with('message','Post Updated Successfully');
    }

    public function accept_post($id)
    {
        $post = Post::findOrFail($id);
        $post->post_status = 'active';
        $post->save();
        return redirect()->back()->with('message','Post status changed to Active');
    }

    public function reject_post($id)
    {
        $post = Post::findOrFail($id);
        $post->post_status = 'rejected';
        $post->save();
        return redirect()->back()->with('message','Post status changed to Rejected');
    }

    public function homepage()
    {
        $post = Post::all();
        return view('home.homepage', compact('post'));
    }

    public function users()
    {
        $data = User::all();
        return view('admin.users', compact('data'));
    }

    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function showEditUserForm($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User information updated successfully.');
    }
}
