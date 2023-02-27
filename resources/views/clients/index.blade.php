@extends('layouts.layout')

     

@section('content')
         <br>
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Liste des clients</h2>

            </div>
             <hr>
                <br>
                <br>
            <div class="pull-left">


           <!-- @if(Auth::user()->role == 'admin')-->
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Ajouter client</a>
            
            <!-- @endif -->
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

            <th>Id</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Adresse</th>
            <th>Tel</th>
            <th>Role</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($clients as $client)

        <tr>

            <td>{{ $client->id }}</td>
            <td>{{ $client->name}}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->adresse }}</td>
            <td>{{ $client->tel }}</td>
            <td>{{ $client->role }}</td>
             
            <td>

                <form action="{{ route('clients.destroy',$client->id) }}" method="POST">

     
              <!--  @if(Auth::user()->role == 'admin' || 'agent')-->
                    <a class="btn btn-info" href="{{ route('clients.show',$client->id) }}">Voir</a>
                <!--  @endif -->
      
               <!--   @if(Auth::user()->role == 'admin') -->
                    <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Edit</a>

               <!--   @endif -->

                    @csrf

                    @method('DELETE')

              <!--   @if(Auth::user()->role == 'admin') -->

                    <button type="submit" class="btn btn-danger">Supp</button>
                <!-- @endif-->
                </form>

            </td>

        </tr>

        @endforeach

    </table>



    {!! $clients->links() !!}

        

@endsection