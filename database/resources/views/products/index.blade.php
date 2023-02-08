@extends('layouts.layout')

     

@section('content')
         <br>
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Liste des produits</h2>

            </div>
             <hr>
                <br>
                <br>
            <div class="pull-left">

                <a class="btn btn-success" href="{{ route('products.create') }}"> Ajouter Produit</a>

            </div>
            <br>
            <br>
        </div>

    </div>

    @if (session('status'))
     <div class=" alert alert-danger"> 
       {{ session('status') }}  

    </div>
    @endif

    

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

     

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Image</th>

            <th>Nom</th>

            <th>Details</th>
            <th>Prix</th>
            <th>stock</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($products as $product)

        <tr>

            <td>{{ $product->id }}</td>

            <td><img src="/image/{{ $product->image }}" width="100px"></td>

            <td>{{ $product->name }}</td>

            <td>{{ $product->detail }}</td>
            <td>{{ $product->prix }}</td>
            <td>{{ $product->qt }}</td>
             
            <td>

                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

     

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Voir</a>

      

                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

     

                    @csrf

                    @method('DELETE')

        

                    <button type="submit" class="btn btn-danger">Supp</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>



    {!! $products->links() !!}

        

@endsection