<?php

namespace App\Http\Controllers;

use App\Company;
use App\MakeRequest;
use App\Service;
use App\Review;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MakeRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //getting list of companies under the host
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();

        //trying to get the company that is active at the moment
        $company = Company::where('user_id', '=', auth()->user()->id)->where('confirm', '=', '1')->get();
        $company = $company[0];

        $makeRequests = MakeRequest::where('company_id', '=', $company->id)->orderBy('id', 'desc')->get();

        return view('request.index', compact('makeRequests', 'company', 'companies'));
    }

    public function showAll(Company $company)
    {
        // dd($company);
        //getting list of companies under the host
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();

        $makeRequests = MakeRequest::where('company_id', '=', $company->id)->orderBy('id', 'desc')->get();
        // dd($makeRequests);


        return view('request.index', compact('makeRequests', 'company', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makeRequest = new MakeRequest();

        //trying to get the company that is active at the moment
        $company = Company::where('confirm', '=', '1')->get();
        $company = $company[0];
        // dd($company);

        return view('request.create', compact('makeRequest', 'company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //trying to get the company that is active at the moment
        $company = Company::where('confirm', '=', '1')->get();
        $company = $company[0];

        $mad = $this->requestValidation();
        $count = count($mad);
        $mad["company_id"] = $company->id;
        $mad["user_id"] = auth()->user()->id;

        $makeRequest = MakeRequest::create($mad);
        
        //not sure
        $reviews = Review::where('company_id', '=', $company->id)->get();
        //get services with the id of the company
        $services = Service::where('company_id', '=', $company->id)->get();
        //not sure

        return view('company.index', compact('company', 'reviews', 'services'))->with('message', 'Request has posted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MakeRequest  $makeRequest
     * @return \Illuminate\Http\Response
     */

    public function show($makeRequest)
    {
        $makeRequest = MakeRequest::findOrFail($makeRequest);

        $companies = Company::where('user_id', '=', auth()->user()->id)->get();
        
        //trying to get the company that is active at the moment
        $company = Company::where('user_id', '=', auth()->user()->id)->where('confirm', '=', '1')->get();
        
        if(count($company)){
            $company = $company[0];
        }
        else{
            $company = Company::where('id', '=', $makeRequest['company_id'])->get();
            $company = $company[0];
        }

        $comments = Comment::where('make_request_id', '=', $makeRequest->id)->orderBy('id', 'desc')->get();


        return view('request.show', compact('makeRequest', 'companies', 'company', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MakeRequest  $makeRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(MakeRequest $makeRequest)
    {
        return view('request.edit', 'makeRequest');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MakeRequest  $makeRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MakeRequest $makeRequest)
    {
        $makeRequest->update($this->requestValidation());

        return view('request.show', 'makeRequest');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MakeRequest  $makeRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(MakeRequest $makeRequest)
    {
        $makeRequest->delete();
    }

    protected function requestValidation()
    {
        return request()->validate([
            'title' => 'required | min:4',
            'detail' => 'required | max:500',

        ]);
    }
}
