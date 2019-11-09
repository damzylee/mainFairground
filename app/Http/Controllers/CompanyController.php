<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();
        
        $company = Company::findOrFail($company);

        return view('company.index', compact('company', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();
        $company = new Company();

        return view('company.create', compact('company', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = Company::create($this->requestValidation());

        $this->storeImage($company);
        $company->update([
            'user_id' => auth()->user()->id
        ]);

        $company = Company::findOrFail($company);
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();

        return view('company.index', compact('company', 'companies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();
        return view('company.index', compact('company', 'companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }

    protected function requestValidation()
    {
        return tap(request()->validate([

            'name' => 'required|min:4',
            'email' => 'required | email',
            'number' => 'required | numeric',
            'country' => 'required | min:3',
            'state' => 'required | min:3',
            'address' => 'required | min:7',
            'type' => 'required',
            'profile' => 'required | max:500',
            'YOE' => 'required | date | before_or_equal:today'
        ]), function(){
                if(request()->hasFile('image'))
                {
                    request()->validate([
                        'image' => 'file|image|max:10000'
                    ]);
                }
        });
    }

    protected function storeImage($company)
    {
        if(request()->has('image')){
            $company->update([
                'image' => request()->image->store('uploads', 'public')
            ]);
        }
    }
}
