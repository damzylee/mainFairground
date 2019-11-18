<?php

namespace App\Http\Controllers;

use App\Service;
use App\Company;
use App\Review;
use App\MakeRequest;
use App\User;

use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $service = new Service();
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();

        //trying to get the company that is active at the moment
        $company = Company::where('user_id', '=', auth()->user()->id)->where('confirm', '=', 1)->get();

        $company = $company[0];
        // dd($company);


        return view('service.create', compact('service', 'companies', 'company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();

        //trying to get the company that is active at the moment
        $company = Company::where('user_id', '=', auth()->user()->id)->where('confirm', '=', '1')->get();

        //getting the active company for both redirecting and uploading of service 
        $mad = $this->requestValidation();
        $count = count($mad);
        $mad["company_id"] = $company[0]->id; 
       
        $service = Service::create($mad);
        $company = $company[0];

        //get services with the id of the company
        $services = Service::where('company_id', '=', $company->id)->get();
        $requests = MakeRequest::where('company_id', '=', $company->id)->orderBy('id', 'desc')->get();
        
        $reviews = Review::where('company_id', '=', $company->id)->get();

        //redirect to company page after adding a service
        return view('company.index', compact('company', 'companies', 'services', 'reviews', 'requests'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //getting list of companies under the host
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();
        
        //get company with its id present in the service company id column
        $comp = Company::where('id', '=', $service->company_id)->get();
        $company = $comp[0];

        return view('service.show', compact('service', 'companies', 'company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //getting list of companies under the host
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();

        //get company with its id present in the service company id column
        $comp = Company::where('id', '=', $service->company_id)->get();
        $company = $comp[0];

        return view('service.edit', compact('service', 'company', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $service->update($this->requestValidation());

        //getting list of companies under the host
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();

        //get company with its id present in the service company id column
        $comp = Company::where('id', '=', $service->company_id)->get();
        $company = $comp[0];

        return view('service.show', compact('service', 'company', 'companies'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        //getting list of companies under the host
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();

        //get company with its id present in the service company id column
        $comp = Company::where('id', '=', $service->company_id)->get();
        $company = $comp[0];

        //get services with the id of the company
        $services = Service::where('company_id', '=', $company->id)->get();
        $requests = MakeRequest::where('company_id', '=', $company->id)->orderBy('id', 'desc')->get();
        
        $reviews = Review::where('company_id', '=', $company->id)->get();

        return view('company.index', compact('services', 'company', 'companies', 'reviews', 'requests'));
    }

    protected function requestValidation()
    {
        return request()->validate([
            'name' => 'required',
            'description' => 'required|max:255',
        ]);
    }
}
