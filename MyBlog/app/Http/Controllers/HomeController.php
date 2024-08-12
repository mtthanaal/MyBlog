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
        if(Auth::id())
        {
            $post = Post::where('post_status','=','active')->get();

            $usertype=Auth()->user()->usertype;

            if($usertype=='user')
            {
                return view('home.homepage',compact('post'));
            }

            else if($usertype=='admin')
            {
                return view('admin.adminhome');
            }

            else
            {
                return redirect()->back();
            }

        }
    }

    public function homepage()
    {

        $post = Post::where('post_status','=','active')->get();
        return view('home.homepage',compact('post'));
    }

    public function post_details($id)
{
    $post = Post::find($id);
    $reviews = Review::where('post_id', $id)->get(); // Ensure this line is retrieving reviews
    return view('home.post_details', compact('post', 'reviews'));
}


    public function create_post()
    {
        return view('home.create_post');
    }

    public function user_post(Request $request)
    {
        $user=Auth()->user();
        $userid=$user->id;
        $username=$user->name;
        $usertype=$user->usertype;


        $post = new Post;
        $post->title= $request->title;
        $post->description= $request->description;
        $post->user_id=$userid;
        $post->name=$username;
        $post->usertype=$usertype;
        $post->post_status='pending';

        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $post->image=$imagename;

        }
        $post->save();
        Alert::success('Congrats','You have added the data successfully');
        return redirect()->back();
    }

    public function my_post()
    {
        $user=Auth::user();
        $userid=$user->id;
        $data=Post::where('user_id','=',$userid)->get();
        return view('home.my_post',compact('data'));
    }

    public function my_post_del($id)
    {
        $data = Post::find($id);
        $data->delete();
        return redirect()->back()->with('message','Post deleted successfully');
    }

    public function post_update_page($id)
    {

        $data = Post::find($id);
        return view('home.post_page',compact('data'));
    }

    public function update_post_data(Request $request,$id)
    {

        $data = Post::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $image =$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $data->image=$imagename;
        }

        $data->save();
        

        return redirect()->back()->with('message','Post Updated Successfully');
    }

    //     public function submit_review(Request $request)
    // {
    //     $review = new Review;
    //     $review->post_id = $request->post_id; 
    //     $review->user_name = auth()->user()->name;
    //     $review->rating = $request->rating;
    //     $review->comment = $request->comment;
    //     $review->save();

    //     return back()->with('message', 'Review submitted successfully!');
    // }

    public function store(Request $request)
    {
        // dd( $request);
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
            'post_id' => 'required|integer|exists:posts,id',
        ]);

       
        // Review::create([
        //     'post_id' => $request->post_id,
        //     'user_name' => auth()->user()->name, 
        //     'rating' => $request->rating,
        //     'comment' => $request->comment,
        // ]);

        
        $user=Auth()->user();
        
        $review = new Review;
        $review->post_id = $request->post_id; 
        $review->user_name = 'ss';
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();

        
        // return redirect()->route('post_details', ['id' => $request->post_id])->with('success', 'Review submitted successfully!');
        return back()->with('success', 'Review submitted successfully!');
    }

    


  
    

}
