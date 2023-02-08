@extends('layouts.app')

   

@section('content')

<br>
 
 <a  href="/products" class="btn btn-info">Retour produits</a>
<hr>
         <div class="row">
            <div class="col-md-6 item-photo">
                 <img style="max-width:100%;"src="/image/{{ $product->image }}"/>
             </div>
             <div class="col-md-6" style="border:0px solid gray">
                 <!-- Datos del vendedor y titulo del producto -->
                 <h3>     {{ $product->name }}</h3>    
                 <!-- Precios -->
                 <h6 class="title-price"><small>Prix</small></h6>
                 <h3 style="margin-top:0px;">     {{ $product->prix }}CFA</h3>                 
     
                 <!-- Botones de compra -->
                 <div class="section" style="padding-bottom:20px;">
                 <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->prix }}" name="prix">
                                <input type="hidden" value="{{ $product->detail}}"  name="detail">
                                <input type="hidden" value="1" name="quantity">
                                <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Agregar al carro</button>
                    
                               
                            </form>
                     
                 </div>                                        
             </div>                              
             <div class="col-xs-9">
     <br>
             
                 <div style="width:100%;border-top:1px solid silver">
                 <p>Detail Produit</p>
                     <p style="padding:15px;">
                         <small>
                         {{ $product->detail }}
                         </small>
                     </p>
     
                 </div>
             </div>		
         </div>
         

@endsection