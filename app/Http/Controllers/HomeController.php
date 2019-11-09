<?php

namespace App\Http\Controllers;
use App\User;
use App\Company;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();
        if(auth()->user()->is_admin == 1){
            return redirect('admin', compact('companies'));
        }
        else{
            return view('home', compact('companies'));
        }
    }

    public function admin()
    {
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();
        if(auth()->user()->is_admin == 1){
            return redirect('admin', compact('companies'));
        }
        else{
            return view('home', compact('companies'));
        }
    }

    public function show(User $user)
    {
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();
        return view('profile.show', compact('user', 'companies'));
    }

    public function edit(User $user)
    {
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();
        return view('profile.edit', compact('user', 'companies'));
    }

    public function update(Request $request, User $user)
    {
        $validatedUser = tap(request()->validate([

            'name' => 'required|min:4',
            'email' => 'required | email',
            'number' => 'required | numeric',
            'country' => 'required | min:3',
            'state' => 'required | min:3',
            'town' => 'min:7',
            'BIOS' => 'max:255',
            'DOB' => 'date | before_or_equal:today'

        ]), function(){
            
                if(request()->hasFile('image'))
                {
                    request()->validate([
                        'image' => 'file|image|max:10000'
                    ]);
                }
        }
    );
        $user->update($validatedUser);

        $this->storeImage($user);
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();
        return view('profile.show', compact('user', 'companies'));
    }

    public function delete(User $user)
    {
        $user->delete();
    }


    protected function storeImage($user)
    {
        if(request()->has('image')){
            $user->update([
                'image' => request()->image->store('uploads', 'public')
            ]);
        }
    }
}