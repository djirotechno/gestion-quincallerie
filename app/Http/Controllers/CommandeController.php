<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Commande;
use App\Models\Product;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cmd = Commande::latest()->paginate(10);
        
        
        return view('admin.cmds.index',compact('cmd'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $items = \Cart::getContent();
        // dd($items);
        foreach($items as $row) {

            Commande::create([
                'qt' => (int)$row->quantity,
                'name' => $row->name,
                'detail' => $row->detail,
                'idprod' => $row->id,
                'prix' => $row->price,
                'qyt' => \Cart::getTotal(),
                'clientid' => $user,
                
               
            ]);
        }
           
       
            

        return redirect()->route('products.index')->with('success','commande  Ajouter !');
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
      

         $cmd =  \DB::table('commandes')->find($id);
        $client = \DB::table('users')->find($cmd->clientid);
        $cmduser = Commande::where('clientid',$client->id)->get();
        
        // dd($cmduser);
        

        return view('admin.cmds.show',compact('cmduser','client'),);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        Commande::where('clientid',$id)->update(['statut'=>1]);
       $prod =  Product::all();
        
        // dd($prod);
   foreach($prod as $prd){
        
   }

        return redirect()->route('cmd.index')->with('success','commande  validee !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
