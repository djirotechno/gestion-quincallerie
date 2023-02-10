@extends('layouts.app')

   

@section('content')
<!-- 
                 <div class="row">
           
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('cmd.index') }}"> Back</a>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card text-center">
                                <div class="card-header">
                                    Featured
                                </div>
                            <div class="card-body">
                
                            <div class="card" style="width: 18rem;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ $client->name }}</li>
                                    <li class="list-group-item">Tel:</li>
                                    <li class="list-group-item">Adresse:</li>
                                </ul>
                            </div>
                            @foreach ($cmduser as $cmd)
                            <h5 class="card-title">Nom:{{ $cmd->name }}</h5>
                                <h5 class="card-title">Prix unit:{{ $cmd->prix }}</h5>
                                <h5 class="card-title">Qty{{ $cmd->qt }}</h5>
                    
                            @endforeach
                            
                
                        </div>
                        <div class="card-footer text-muted">
                            <a href="#" class="btn btn-primary">Valider Commande</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis nulla nesciunt, ea natus esse odit, quas perspiciatis placeat facilis doloribus ipsum ipsa. Porro sint suscipit ipsam et soluta dolor quo?
                </div> -->
    
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
<div class="card">
<div class="card-header p-4">
<a class="pt-2 d-inline-block" href="index.html" data-abc="true">
    <img src="{{ asset('image/logo.jpg') }}" width="100px"alt="logo" srcset="">
</a>
<div class="float-right"> <h3 class="mb-0">Facture: #BBB10234</h3>
{{Carbon\Carbon::now()}}</div>
</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-6">
<h5 class="mb-3">From:</h5>
<h3 class="text-dark mb-1">Quincallerie General </h3>
<div>29, Singla Street</div>
<div>Sikeston,New Delhi 110034</div>
<div>Email: contact@gmail.com</div>
<div>Phone:+221 77 000 00 00 </div>
</div>
<div class="col-sm-6 ">
<h5 class="mb-3">To:</h5>
<h3 class="text-dark mb-1">Nom:{{ $client->name }}</h3>
<div>Adresse:{{$client->adresse}}</div>

<div>Email:{{ $client->email}}</div>
<div>Phone:{{$client->tel}}</div>
</div>
</div>
<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th class="center">#</th>
<th>Item</th>
<th>Description</th>
<th class="right">Price</th>
<th class="center">Qty</th>
<th class="right">Total</th>
</tr>
</thead>
<tbody>
@foreach ($cmduser as $cmd)
<tr>
<td class="center">{{$cmd->idprod}}</td>
<td class="left">{{ $cmd->name }}</td>
<td class="left">{{ $cmd->detail}}</td>
<td class="right">{{$cmd->prix}}</td>
<td class="center">{{ $cmd->qt}}</td>
<td class="right">{{ $cmd->qt * $cmd->prix }}</td>
</tr>
@endforeach
</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-8 col-sm-5">
</div>
<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>
<tr>

<td class="left">
<strong class="text-dark">Total</strong>
 </td>
<td class="right">
<strong class="text-dark">{{$cmd->qyt}}</strong>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="row">
    <form action="{{ route('cmd.update',$cmd->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <button  class="btn btn-block btn-success">
    <strong >Valider</strong>
    </button>
    </form>
  
</div>
</div>

<div class="card-footer bg-white">
<p class="mb-0">Quincaillerie general Tech</p>
</div>
</div>
</div>
@endsection