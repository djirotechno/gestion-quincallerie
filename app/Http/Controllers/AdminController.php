<?php
namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;
class AdminController extends Controller
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

       $products = Product::latest()->paginate(20);
       // dd($products);
       return view('admin.produits.index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
   }

  

   /**

    * Show the form for creating a new resource.

    *

    * @return \Illuminate\Http\Response

    */

   public function create()

   {

       return view('admin.produits.create');

   }

   

   /**

    * Store a newly created resource in storage.

    *

    * @param  \Illuminate\Http\Request  $request

    * @return \Illuminate\Http\Response

    */

   public function store(Request $request)

   {
       $request->validate([

           'name' => 'required',
           'detail' => 'required',
           'prix' => 'required',
           'qt' => 'required',

           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

       ]);
       $input = $request->all();

       if ($image = $request->file('image')) {

           $destinationPath = 'image/';

           $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

           $image->move($destinationPath, $profileImage);

           $input['image'] = "$profileImage";

       }

   

       Product::create($input);
       return redirect()->route('admin.index')->with('success','Product created successfully.');

   }

    

   /**

    * Display the specified resource.

    *

    * @param  \App\Product  $product

    * @return \Illuminate\Http\Response

    */

   public function show($id)

   {
    $product =  \DB::table('products')->find($id);

       return view('admin.produits.show',compact('product'));

   }

    

   /**

    * Show the form for editing the specified resource.

    *

    * @param  \App\Product  $product

    * @return \Illuminate\Http\Response

    */

   public function edit($id)

   {
    $product =  \DB::table('products')->find($id);
       return view('admin.produits.edit',compact('product'));

   }

   

   /**

    * Update the specified resource in storage.

    *

    * @param  \Illuminate\Http\Request  $request

    * @param  \App\Product  $product

    * @return \Illuminate\Http\Response

    */

   public function update(Request $request, Product $product)

   {

       $request->validate([

           'name' => 'required',

           'detail' => 'required',
           'prix' => 'required'

       ]);

 

       $input = $request->all();

 

       if ($image = $request->file('image')) {

           $destinationPath = 'image/';

           $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

           $image->move($destinationPath, $profileImage);

           $input['image'] = "$profileImage";

       }else{

           unset($input['image']);

       }

         

       $product->update($input);

   

       return redirect()->route('admin.index')->with('success','Product updated successfully');

   }

 

   /**

    * Remove the specified resource from storage.

    *

    * @param  \App\Product  $product

    * @return \Illuminate\Http\Response

    */

   public function destroy($id)

   {
    $product = Product::findOrFail($id);
    $product->delete();

       

    

       return redirect()->route('admin.index')->with('success','Product deleted successfully');

   }
}
