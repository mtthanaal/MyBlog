<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Alert;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $post = Post::where('post_status', 'active')->get();
            $usertype = Auth::user()->usertype;

            if($usertype == 'user')
            {
                return view('home.homepage', compact('post'));
            }
            else if($usertype == 'admin')
            {
                return view('admin.adminhome');
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function homepage()
    {
        $post = Post::where('post_status', 'active')->get();
        return view('home.homepage', compact('post'));
    }

    public function post_details($id)
    {
        $post = Post::findOrFail($id);
        $reviews = Review::where('post_id', $id)->where('approved', true)->get();
        return view('home.post_details', compact('post', 'reviews'));
    }

    public function create_post()
    {
        return view('home.create_post');
    }

    public function user_post(Request $request)
    {
        $user = Auth::user();

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $user->id;
        $post->name = $user->name;
        $post->usertype = $user->usertype;
        $post->post_status = 'pending';

        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('postimage'), $imageName);
            $post->image = $imageName;
        }

        $post->save();
        Alert::success('Congrats','You have added the data successfully');
        return redirect()->back();
    }

    public function my_post()
    {
        $user = Auth::user();
        $data = Post::where('user_id', $user->id)->get();
        return view('home.my_post', compact('data'));
    }

    public function my_post_del($id)
    {
        $data = Post::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('message','Post deleted successfully');
    }

    public function post_update_page($id)
    {
        $data = Post::findOrFail($id);
        return view('home.post_page', compact('data'));
    }

    public function update_post_data(Request $request, $id)
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

    public function store_review(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
            'post_id' => 'required|integer|exists:posts,id',
        ]);

        $review = new Review;
        $review->post_id = $request->post_id; 
        $review->user_name = Auth::user()->name;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->approved = false; 
        $review->save();

        return back()->with('success', 'Review submitted successfully and is awaiting approval!');
    }

    public function approvedComments()
    {
        $reviews = Review::get();
        return view('home.approved_comments', compact('reviews'));
    }
}
