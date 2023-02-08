@extends('layouts.app')
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

            @if(Auth::user()->role == 'admin' && 'agent')
                <a class="btn btn-success" href="{{route('admin.create')}}"> Ajouter Produit</a>
            @endif
      
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

            <th>Num</th>
            <th>Image</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Stock</th>
          

            <th width="280px">Action</th>

        </tr>

        @foreach($products as $product)

           

        <tr>

            <td>{{ $product->id }}</td>
            <td><img src="/image/{{ $product->image }}" width="100px"></td>
            <td>{{ $product->name }}</td>
          
            <td>{{ $product->prix }}</td>
            <td>{{ $product->qt }}</td>
          
       
            <td>


            <form action="{{route('admin.destroy',$product->id) }}" method="POST">  
                    @csrf

                    @method('DELETE')
                    <a class="btn btn-info" href="{{route('admin.show',$product->id )}}">Voir</a>
              
      
                @if(Auth::user()->role == 'admin')
                    <a class="btn btn-primary" href="{{route('admin.edit',$product->id )}}">Edit</a>

                @endif
               

                 

               @if(Auth::user()->role == 'admin')

                    <button type="submit" class="btn btn-danger">Supp</button>
               @endif
                </form>

            </td>

        </tr>

        @endforeach

    </table>
    {!! $products->links() !!}
   
    @endsection