<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Response;
use App\Models\Client;
use App\Models\User;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $clients = User::latest()->paginate(20);
        //dd($clients);
        return view("clients.index" , compact('clients'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function store(Request $request)

    {
        $request->validate([

            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required',
            'password' => 'required',
            'adresse' => 'required',
            'tel' => 'required',
            'role' => 'required',
        ]);
        $input = $request->all();

        Client::create($input);
        return redirect()->route('clients.index')->with('success','client created successfully.');

    }

    public function create()

    {

        return view('clients.create');

    }

    public function show($id)

    {
        $client = User::findOrFail($id);

        return view('clients.show',compact('client'));

    }

    public function edit($id)

    {
        $client = User::findOrFail($id);

        return view('clients.edit',compact('client'));

    }

    public function update(Request $request,$id)
    {
      
        $user = User::find($id);
        $user->update($request->all());
           
        return redirect()->route('clients.index')->with('success','client update successfully.');
      
    }

     public function login() {
         return view('/clients.login');
     }

     public function loginclients(Request $request) {
         $password =$request->password;
     
        $clients = Client::where('password',$password )->exists();
       // dd($clients) ;
       if($clients){
           return view('welcome');

       }
       else{
           return redirect->back();
       }
    }
    
}
