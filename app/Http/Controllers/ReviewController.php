<?php

namespace App\Http\Controllers;

use App\Review;
use App\Company;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();

        return view('review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $review = new Review();

        $companies = Company::all();

        return view('review.create', compact('review', 'companies'));
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
        // dd($mad);

        $review = Review::create($mad);

        $this->storeImage($review);

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        
        return view('review.show', 'review');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('review.edit', 'review');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $review->update($this->requestValidation());

        $this->storeImage($review);

        return view('review.show', compact('review'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
    }

    protected function requestValidation()
    {
        return tap(request()->validate([
            'review' => 'required | max:255',
            'company_id' => 'required'

        ]), function(){

            if(request()->hasFile('image')){
                request()->validate([
                    'image' => 'file|image|max:10000'
                ]);
            }
        });
    }

    protected function storeImage($review)
    {
        if(request()->has('image')){
            $review->update([
                'image' => request()->image->store('uploads', 'public')
            ]);
        }
    }
}