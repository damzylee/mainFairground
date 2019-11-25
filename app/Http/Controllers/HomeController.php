<?php

namespace App\Http\Controllers;
use App\User;
use App\Company;
use App\Sectors;
use App\Service;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

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
        $companiess = Company::paginate(6);
        $sectors = Sectors::paginate(6);

        $companies = Company::where('user_id', '=', auth()->user()->id)->get();
        
        if(auth()->user()->is_admin == 1){
            return redirect('admin', compact('companies', 'companiess', 'sectors'));
        }
        else{
            return view('home', compact('companies', 'companiess', 'sectors'));
        }
    }

    public function admin()
    {
        $companiess = Company::paginate(6);
        $sectors = Sectors::paginate(6);
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();

        if(auth()->user()->is_admin == 1){
            return view('admin', compact('companies', 'companiess', 'sectors'));
        }
        // else{
        //     return view('home', compact('companies', 'companiess', 'sectors'));
        // }
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
            'town' => 'min:3',
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

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/welcome');
    }


    protected function storeImage($user)
    {
        if(request()->has('image')){
            $user->update([
                'image' => request()->image->store('uploads', 'public')
            ]);
        }
    }

    public function search(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(Company::class, 'name')
            ->registerModel(Sectors::class, 'name')
            ->registerModel(Service::class, 'name')
            ->perform($request->input('query'));
        $companies = Company::where('user_id', '=', auth()->user()->id)->get();

        return view('search', compact('searchResults', 'companies'));
    }
}