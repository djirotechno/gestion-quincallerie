@extends('layouts.layout')

     

@section('content')
         
          <br>
          <br>
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

            <h2>Liste des ventes</h2>  
            </div>
            <div class="row">
    <div class="col">
    <div class="card">
  <div class="card-body">
  <h5 class="card-title">Total Ventes</h5>
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$vt}}</h5>
    <h6 class="card-subtitle mb-2 text-muted"></h6>
  </div>
</div>
  </div>
</div>
    </div>
    <div class="col">
    <div class="card">
  <div class="card-body">
  <h5 class="card-title">Stock</h5>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">{{$stock}}</h5>
       
         </div>
    </div>
  </div>
</div>
    </div>
  </div>
                <br>
                <br>
                <br>
            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('products.index') }}">Retour liste produits</a>

            </div>
            <br>
            <br>
        </div>

    </div>

    

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

     

    <table class="table table-bordered">

        <tr>

            <th>No</th>

          <!--  <th>Image</th>-->

            <th>Nom</th>

            <th>Details</th>
            <th>Prix</th>
            <th>qty</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($ventes as $vente)

        <tr>

            <td>{{$vente->id }}</td>

          <!--  <td><img src="/image/{{ $vente->image }}" width="100px"></td>-->

            <td>{{ $vente->name }}</td>

            <td>{{ $vente->detail }}</td>
            <td>{{ $vente->prix }}</td>
            <td>{{ $vente->qty }}</td>

            <td>

                <form action="{{ route('vente.destroy',$vente->id) }}" method="POST">

     

                    <a class="btn btn-info" href="{{ route('vente.show',$vente->id) }}">Voir</a>

      

                    <a class="btn btn-primary" href="{{ route('vente.edit',$vente->id) }}">Edit</a>

     

                    @csrf

                    @method('DELETE')

        

                    <button type="submit" class="btn btn-danger">Supp</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>



    {!! $ventes->links() !!}

        

@endsection