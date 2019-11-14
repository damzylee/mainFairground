<?php

namespace App\Http\Controllers;

use App\Sectors;
use App\Company;
use Illuminate\Http\Request;

class SectorsController extends Controller
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
        $sector = new Sectors();

        $companies = Company::all();

        return view('sector.create', compact('sector', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sector = Sectors::create($this->requestValidation());

        $this->storeImage($sector);

        $sector = new Sectors();

        $companies = Company::all();

        return view('sector.create', compact('sector', 'companies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sectors  $sectors
     * @return \Illuminate\Http\Response
     */
    public function show($sectors)
    {
        $sector = Sectors::where('id', '=', $sectors)->get();
        $sector = $sector[0];
        $companies = Company::where('sector_id', '=', $sector->id)->paginate(8);
        // dd($companies);
        return view('sector.show', compact('sector', 'companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sectors  $sectors
     * @return \Illuminate\Http\Response
     */
    public function edit(Sectors $sectors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sectors  $sectors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sectors $sectors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sectors  $sectors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sectors $sectors)
    {
        //
    }

    protected function requestValidation()
    {
        return tap(request()->validate([
            'name' => 'required | min:4',

        ]), function(){

            if(request()->hasFile('image')){
                request()->validate([
                    'image' => 'file|image|max:10000'
                ]);
            }
        });
    }

    protected function storeImage($sector)
    {
        if(request()->has('image')){
            $sector->update([
                'image' => request()->image->store('uploads', 'public')
            ]);
        }
    }
}
