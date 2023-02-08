@extends('layouts.layout')



@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Edit client</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>

        </div>

    </div>

</div>



@if ($errors->any())

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif



<form action="{{ route('clients.update',$client->id) }}" method="POST" enctype="multipart/form-data">

    @csrf

    @method('PUT')



    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Prenom:</strong>

                <input type="text" name="prenom" value="{{ $client->prenom }}" class="form-control"
                    placeholder="Prenom">

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Nom:</strong>

                <input type="text" name="nom" value="{{ $client->nom }}" class="form-control" placeholder="Nom">

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Email:</strong>

                <input type="email" name="email" value="{{ $client->email }}" class="form-control" placeholder="Email">

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Adresse:</strong>

                <input type="text" name="adresse" value="{{ $client->adresse }}" class="form-control"  placeholder="Adresse">
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Tel:</strong>

                <input type="number" name="tel" value="{{ $client->tel }}" class="form-control" placeholder="Tel">

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>



</form>

@endsection