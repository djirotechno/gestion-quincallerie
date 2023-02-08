@extends('layouts.layout')

   

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  Client</h2>
            </div>
                <br>
            <hr>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>
            </div>
        </div>
        </div>
        <br>
    <div class="row">
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prenom:</strong>
                {{ $client->prenom }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Nom:</strong>
                {{ $client->nom }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Email:</strong>
                {{ $client->email }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Adresse:</strong>

                {{ $client->adresse }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
             <strong>Tel:</strong>

             {{ $client->tel }}
       </div>
        </div>
        
        </div>
    </div>
<!-- <a  href="{{route('vente.index')}}" class="btn btn-danger">Delete</a> -->

@endsection