<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Company;
use App\Review;
use App\Service;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();

        return view('comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comment = new Comment();

        return view('comment.create', compact('comment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mad = $this->requestValidation();
        $mad["user_id"] = auth()->user()->id;
        $comment = Comment::create($mad);

        $company = Company::findOrFail($request['company_id']);
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();

        //not sure
        $reviews = Review::where('company_id', '=', $company->id)->get();
        //get services with the id of the company
        $services = Service::where('company_id', '=', $company->id)->get();
        //not sure

        return view('company.index', compact('company', 'companies', 'reviews', 'services'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->validate([
            'comment' => 'required'
        ]));

        return view('comment.show', compact('comment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
    }

    protected function requestValidation(){
        return request()->validate([
            'comment' => 'required',
            'review_id' => 'required',
            'company_id' => 'required'
    ]);
    }
}
