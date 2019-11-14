<?php

namespace App\Http\Controllers;

use App\Company;
use App\Review;
use App\Service;
use App\MakeRequest;
use App\Sectors;
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
        $reviews = Review::where('company_id', '=', $company->id)->orderBy('id', 'desc')->get();
        
        $company = Company::findOrFail($company);

        return view('company.index', compact('company', 'companies', 'reviews'));
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
        $sectors = Sectors::all();

        return view('company.create', compact('company', 'companies', 'sectors'));
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
        $mad["type"] = 'company';
        
        $company = Company::create($mad);

        $this->storeImage($company);
        $company->update([
            'user_id' => auth()->user()->id
        ]);

        $company = Company::findOrFail($company);
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();
        //not sure
        $reviews = Review::where('company_id', '=', $company->id)->orderBy('id', 'desc')->get();
        dd($reviews);
        $requests = MakeRequest::where('company_id', '=', $company->id)->orderBy('id', 'desc')->get();
        //get services with the id of the company
        $services = Service::where('company_id', '=', $company->id)->get();
        //not sure

        return view('company.index', compact('company', 'companies', 'reviews', 'services', 'requests'))->with('message', 'Company has been created successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        if(auth()->guest()) 
        {
            $companies = '';
            // dd($company);
        }
        else{
            $companies = Company::where('user_id', '=', auth()->user()->id)->get();

            Company::where('confirm', '=', 1)->update(['confirm' => 0]);

            //finding and setting the active company of a user to one so i can be able to use if i need its id later and setting others to zero
            $find = Company::findOrFail($company->id);
            if($find->confirm == 0){
                $find->update([
                    'confirm' => 1
                    ]);
    
                foreach($companies as $companys){
                    if($companys->id !== $find->id){
                        $companys->update([
                            'confirm' => 0
                        ]);
                    }
                }
            }
            //end
        }



        $reviews = Review::where('company_id', '=', $company->id)->orderBy('id', 'desc')->get();
        $requests = MakeRequest::where('company_id', '=', $company->id)->orderBy('id', 'desc')->get();

        //get services with the id of the company
        $services = Service::where('company_id', '=', $company->id)->get();

        return view('company.index', compact('company', 'companies', 'services', 'reviews', 'requests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();


        //get services with the id of the company
        $services = Service::where('company_id', '=', $company->id)->get();
        $sectors = Sectors::all();

        return view('company.edit', compact('company', 'companies', 'services', 'sectors'));
    }

    public function deleteCompany(Company $company)
    {
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();


        //get services with the id of the company
        $services = Service::where('company_id', '=', $company->id)->get();

        return view('company.delete', compact('company', 'companies', 'services'));
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
        $company->update($this->requestValidation());

        $this->storeImage($company);

        //get all the companies owned by the host
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();

        $reviews = Review::where('company_id', '=', $company->id)->orderBy('id', 'desc')->get();
        $requests = MakeRequest::where('company_id', '=', $company->id)->orderBy('id', 'desc')->get();

        //get services with the id of the company
        $services = Service::where('company_id', '=', $company->id)->get();

        return view('company.index', compact('company', 'companies', 'services', 'reviews', 'requests'))->with('message', 'Company details updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        //get all the companies owned by the host
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();

        $reviews = Review::where('company_id', '=', $company->id)->orderBy('id', 'desc')->get();

        //get services with the id of the company
        $services = Service::where('company_id', '=', $company->id)->get();
        $sectors = Sectors::paginate(6);

        return view('home', compact('company', 'companies', 'services', 'reviews', 'sectors'))->with('message', 'Company has successfully been deleted');;

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
            'sector_id' => 'required',
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
