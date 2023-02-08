@extends('layouts.layout')

   

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  Product</h2>
            </div>
                <br>
            <hr>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
        </div>
        <br>
    <div class="row">
        <div class="col-md-6">1 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <img src="/image/{{ $product->image }}" width="500px">
        </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            
        <form action="{{ route('vente.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden"  name="_token" value="{{ csrf_token() }}">
             <input type="number" name="idprod" value="{{ $product->id }}" hidden>
            <div class="form-group">

                <strong>Name:</strong>
                  <input type="text"  value="{{ $product->name }}" name="name" hidden>
                {{ $product->name }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Details:</strong>
                <input type="text"  value="{{ $product->detail  }}" name="detail" hidden>
                {{ $product->detail }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Prix:</strong>
                <input type="number"  value="{{ $product->prix}}" name="prix" hidden>
                {{ $product->prix }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Quantitee Stock:</strong>

                {{ $product->qt }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
             <strong>Qty:</strong>
            <input type="number" name="qty" class="form-control" placeholder="Qty">
            </div>
        </div>
        
        </div>
    </div>

    <div class="">
        <button type="submit" class="btn btn-block btn-info btn-lg">Vendre</button>
    </div>
</form>
<!-- <a  href="{{route('vente.index')}}" class="btn btn-danger">Delete</a> -->

@endsection