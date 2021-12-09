<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function show(BlogComment $blogComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogComment $blogComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogComment $blogComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogComment $blogComment)
    {
        //
    }

    public function addComment(Request $request){
        $request->validate([
            "message"=>"required",
            "post_id"=>"required",
            "blog_comment_id"=>"integer|nullable"
        ]);

        $comment = (object)$request->all();
        $comment->user_id = Auth::user()->id;

        BlogComment::create((array)$comment);

        return response()->noContent();
    }

    public function getCommentForPost($postId){
        $blogComments = BlogComment::where("post_id", $postId)
            ->where("is_active",true)
            ->orderBy("id","desc")->get();

        return response()->json($blogComments);
    }

    public function removeComment($postId){
        $blogComments = BlogComment::where("post_id", $postId)->get();

        if (is_null($blogComments))
            return response()->noContent();

        $blogComments->delete();

        return response()->json($blogComments);
    }
}
