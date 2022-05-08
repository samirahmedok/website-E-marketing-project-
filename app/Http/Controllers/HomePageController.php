<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\Products;
use App\Models\Categories;
use App\Models\comments;
use App\Models\likes;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mail\contact_us;
use Illuminate\Support\Facades\Mail;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index()
    {
        $products = products::all();
        $categories = categories::all();
        return view('pages.boutique', compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Products::where('id',$id)->first();
        $categories = Categories::where('id',$id)->first();
        $category = Categories::all();

        return view('pages.sorts',compact('products','categories','category'));
    }

    public function show_details($id)
    {
        $products = Products::where('id',$id)->first();
        $categories = Categories::where('id',$id)->first();
        $comments = comments::where('id',$id)->first();
        return view('pages.details',compact('products','categories','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePage $homePage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePage $homePage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePage $homePage)
    {
        //
    }

    public function like(Request $request)
    {
        $like_s = $request->like_s;
        $comments_id = $request->comments_id;
        $change_like = 0;

        $like = DB::table('likes')
        ->where('comments_id',$comments_id)
        ->where('user_id',Auth::user()->id)
        ->first();

        if(!$like)
        {
            $new_like = new likes;
            $new_like->comments_id = $comments_id;
            $new_like->user_id = Auth::user()->id;
            $new_like->like = 1;
            $new_like->save();

            $is_like = 1;
        }
        elseif($like->like == 1)
        {
            DB::table('likes')
            ->where('comments_id',$comments_id)
            ->where('user_id',Auth::user()->id)
            ->delete();

            $is_like = 0;
        }
        elseif($like->like == 0)
        {
            DB::table('likes')
            ->where('comments_id',$comments_id)
            ->where('user_id',Auth::user()->id)
            ->update(['like' => 1]);

            $is_like = 1;
            $change_like = 1;
        }

        $response = array(
            'is_like' => $is_like,
            'change_like' => $change_like,
        );

        return response()->json($response , 200);
    }



    public function dislike(Request $request)
    {
        $like_s = $request->like_s;
        $comments_id = $request->comments_id;
        $change_dislike = 0 ;

        $dislike = DB::table('likes')
        ->where('comments_id',$comments_id)
        ->where('user_id',Auth::user()->id)
        ->first();

        if(!$dislike)
        {
            $new_like = new likes;
            $new_like->comments_id = $comments_id;
            $new_like->user_id = Auth::user()->id;
            $new_like->like = 0;
            $new_like->save();

            $is_dislike = 1;
        }
        elseif($dislike->like == 0)
        {
            DB::table('likes')
            ->where('comments_id',$comments_id)
            ->where('user_id',Auth::user()->id)
            ->delete();

            $is_dislike = 0;
        }
        elseif($dislike->like == 1)
        {
            DB::table('likes')
            ->where('comments_id',$comments_id)
            ->where('user_id',Auth::user()->id)
            ->update(['like' => 0]);

            $is_dislike = 1;
            $change_dislike = 1;
        }

        $response = array(
            'is_dislike' => $is_dislike,
            'change_dislike' => $change_dislike,
        );

        return response()->json($response , 200);
    }

    public function contactus()
    {
        return view('pages.contact');
    }

    public function dosend(request $request)
    {
        
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $body = $request->input('body');

        Mail::to('ahmed.samir10044@gmail.com')->send(new contact_us($name,$email,$subject,$body));
        session()->flash("success" , "'I got your message and will answer you asap....");
        return back();

    }
}
