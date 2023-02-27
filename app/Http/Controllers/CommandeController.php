<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Commande;
use App\Models\Product;
use Helper;
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
        $user = Auth::user();
        $items = \Cart::getContent();
        $total = $request->qyt;
        $stock = new Helper();
        // $total = Commande::where('user_id',$user->id)->sum('qt');
        foreach($items as $row) {
       
        // dd($total);

            $qty = $stock::geststock((int)$row->quantity);
            if($qty === false){
                Commande::create([
                    'qt' => (int)$row->quantity,
                    'name' => $row->name,
                    'detail' => $row->detail,
                    'idprod' => $row->id,
                    'prix' => $row->price,
                    'user_id' => $user->id,
                    'adresse' => $user->adresse,
                    'tel' => $user->tel,
                    'qyt' => $total,
                    
                   
                ]);
            }else{
        return redirect()->route('cart.list')->with('success','stock insuffisante!');

            }
          
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
        $client = \DB::table('users')->find($cmd->user_id);
        $cmduser = Commande::where('user_id',$client->id)->get();
        // $usehet =  \Cart::getTotal()
        // dd($usehet);
        

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


 

// public function Stock(Request $request, $id)
// {
//     $product = Product::find($id);
//     $quantity = $request->input('quantity');
//     $product->updateStock($id, $quantity);
//     return redirect()->back()->with('success', 'Stock updated successfully');
// }



    public function update($id)
    {
         

        $stock = new Helper();

            $cmdtable = Commande::all();
            $product = Product::all();

            foreach($cmdtable as $cmd){
                $prod = Product::where('id',$cmd->idprod)->get();
                // dd($prod);
                $cmdvalide =   Commande::where($cmd->id,$id);
                $cmdvalide->update(['statut'=> 1]);
                // updateStock($prod->id,);
            }
            
            $stock::updateStock($cmdtable, $product);
      

        return redirect()->route('cmd.index')->with('success','commande  validee !');

    }

    /**
     * Remove the specified resource from storage.
     
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cmd = Commande::findOrFail($id);
        $cmd->delete();
    

        return redirect()->route('cmd.index')->with('success','commande  suprimer !');

    }
}
