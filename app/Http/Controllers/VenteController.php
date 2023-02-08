<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Vente;

class VenteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventes = Vente::latest()->paginate(20);
        // dd($ventes);
        $vt = Vente::sum('prix');

        $qty = Vente::sum('qty');
        $qte = Product::sum('qt');
        $stock = $qte - $qty;
         //dd($qte);

        return view('vente.index', compact('ventes','stock','vt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idpro = $request->idprod;
        $qtyInit = Product::where('id' , $request->idprod)->first();

       // $qtys = $request->qty;
        
        $stkAct = intval($qtyInit->qt) - intval($request->qty);

        

         //dd($stkAct);
        $this->validate($request , [

            'prix' =>'required' ,
            'name' => 'required',
            'detail' => 'required',
            'qty' =>'required',
             'idprod => required',
        ]);
        // 'integer','min:$min','max:$max']
        // qty:min()=>numbers()

        
              
           

        
            Product::where('id' , $idpro)->update(array('qt' => $stkAct));
                $vente = new Vente();
                $vente->prix =$request->prix * $request->qty;
                $vente->name =$request->name;
                $vente->detail =$request->detail;
                $vente->qty =$request->qty;
                $vente->idprod =$request->idprod;
                $vente->save();

          return redirect('products')->with('success','vendu avec success !');
        
        

         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

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
    public function update(){
        //
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
