<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::latest()->paginate(20);
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

    public function show(Client $client)

    {

        return view('clients.show',compact('client'));

    }

    public function edit(Client $client)

    {

        return view('clients.edit',compact('client'));

    }

    public function update(Request $request, Client $client)

    {

        $request->validate([

            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required',
            'adresse' => 'required',
            'tel' => 'required',

        ]);

  

        $input = $request->all();

  

        // if ($image = $request->file('image')) {

        //     $destinationPath = 'image/';

        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

        //     $image->move($destinationPath, $profileImage);

        //     $input['image'] = "$profileImage";

        // }else{

        //     unset($input['image']);

        // }

          

        $client->update($input);

    

        return redirect()->route('clients.index')

                        ->with('success','client updated successfully');

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
