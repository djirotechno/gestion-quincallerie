
@extends('layouts.layout')
@section('content')
   


  

    <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <a href="/products">Tout les produits</a>
                
            <form method="GET" action="/products">
                                <div class="p row">
                                    <div class="col-md-6 ">
                                
                                            <input type="text" class="form-control mr-2" name="term" placeholder="Cherche un produits" id="term">
                                          
                                    </div>
                                    <div class="col-md-6 ">
                                
                                       
                                        <button class="btn btn-info">ok</button>
                                </div>
                                </div>
                               </form>
                               <hr>
           
                              
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 ">
                @foreach($products as $product)

                    <div class="col mb-5">
                        <div class="card h-100">
                            
                            <span style="text-align:center">
                            stock: {{$product->qt}}
                            </span>
<hr>
                            <!-- Product image-->
                            <a href="{{ route('products.show',$product->id) }}" style="text-decoration:none">
                            <img class="card-img-top mx-auto d-block" src="/image/{{ $product->image }}" alt="..." style="width:170px" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product->name}}</h5>
                               
                                    <!-- Product price-->
                                    {{ $product->prix}} cfa
                                </div>
                            </div>
                            </a>
                            <!-- Product actions-->
                           <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->prix }}" name="prix">
                                <input type="hidden" value="{{ $product->detail}}"  name="detail">
                                <input type="hidden" value="1" name="quantity">  <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                           
                                <button class="text-center btn btn-outline-dark mt-auto">Ajoute</button>
                               
                            </form>
                            
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>

        
           
        </section>
@endsection