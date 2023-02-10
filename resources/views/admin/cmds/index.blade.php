@extends('layouts.app')
@section('content')
         <br>
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Liste des commandes</h2>

            </div>
             <hr>
                <br>
                <br>
            <div class="pull-left">


         
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

        

        @foreach ($cmd as $client)

            <tr>       
                @foreach($client->user->commande as $commande)
                <td>
                    
                    @once
                    <p>{{ $commande->user->name}}</p> 
                    @endonce

                </td>
                @endforeach
            </tr>
            <tr>

                <th>Nom</th>
                <th>Prix</th>
                <th>Qty</th>
                <th>Total</th>
                <th>statut</th>

                <th width="280px">Action</th>

            </tr>
            <tr>
        
                <td>{{ $client->name }}</td>
            
                <td>{{ $client->prix }}</td>
                <td>{{ $client->qt }}</td>
                <td>{{ $client->qt * $client->prix}}</td>
                <td>
                @if($client->statut === 1)
                <img src="/image/verifie.png" width="30px">
                    @else
                    <img src="/image/fermer.png" width="30px">
                    @endif
            </td>
          
         
            
            <td>  
                
                 <form action="{{route('cmd.destroy',$client->id) }}" method="POST">  
                    @csrf

                    @method('DELETE')
                    <a class="btn btn-info" href="{{ route('cmd.show',$client->id) }}">Voir</a>
               @if(Auth::user()->role == 'admin')

                    <button type="submit" class="btn btn-danger">Supp</button>
               @endif
                </form>
               
        
        
            </td>
        </tr>

        @endforeach

    </table>



   

        

@endsection