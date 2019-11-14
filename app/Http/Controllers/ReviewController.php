<?php

namespace App\Http\Controllers;

use App\Review;
use App\Company;
use App\Comment;
use App\Service;
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

    public function companyPostView()
    {
        $review = new Review();

        $companies = Company::all();

        return view('review.create2', compact('review', 'companies'));
    }

    public function companyPost()
    {
        //trying to get the company that is active at the moment
        $company = Company::where('confirm', '=', '1')->get();
        $company = $company[0];

        $mad = $this->requestValidation2();
        $mad["user_id"] = auth()->user()->id;
        $mad["company_id"] = $company->id;
        // dd($mad);

        $review = Review::create($mad);

        $this->storeImage($review);

        
        //not sure
        $reviews = Review::where('company_id', '=', $company->id)->get();
        //get services with the id of the company
        $services = Service::where('company_id', '=', $company->id)->get();
        //not sure

        return view('company.index', compact('company', 'services', 'reviews'))->with('message', 'Review was successfully posted.');
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

        return redirect('home')->with('message', 'Review was successfully posted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        if(auth()->guest()) 
        {
            $companies = [];
            $company = Company::where('id', '=', $review['company_id'])->get();
        }
        else{
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();
        

        //trying to get the company that is active at the moment
        $company = Company::where('user_id', '=', auth()->user()->id)->where('confirm', '=', '1')->get();
        }
        if(count($company)){
            $company = $company[0];
        }
        else{
            $company = Company::where('id', '=', $review['company_id'])->get();
            $company = $company[0];
        }
        $comments = Comment::where('review_id', '=', $review->id)->orderBy('id', 'desc')->get();
        
        return view('review.show', compact('review', 'companies', 'company', 'comments'));
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

    protected function requestValidation2()
    {
        return tap(request()->validate([
            'review' => 'required | max:255',

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