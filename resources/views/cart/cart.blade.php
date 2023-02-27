
@extends('layouts.app')

@section('content')



        <section class="h-100" style="background-color: #eee;">


          @if ($message = Session::get('success'))

          <div class="alert alert-info">
  
              <p>{{ $message }}</p>
  
          </div>
  
      @endif

          @if ($message = Session::get('error'))

          <div class="alert alert-info">
  
              <p>{{ $message }}</p>
  
          </div>
  
      @endif
  <div class="h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
      @foreach ($cartItems as $item)
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 ">
          
              </div>
              <div class="col-md-2 ">
                <p class="lead fw-normal mb-2">{{ $item->name }}</p>
                <p class="lead fw-normal mb-2"  >{{ $item->productid }}</p>
          
       
               
              </div>
              <div class="col-md-2 d-flex">
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id}}" >
                        <input class="form-control form-control-sm" type="text" name="quantity" value="{{ $item->quantity }}" >
                        <br>
                        <button type="submit" class="btn btn-info">update</button>
                    </form>
               </div>

                <div class="col-md-2 d-flex">
                    <h5 class="mb-0"> ${{ $item->price }}</h5>
                </div>
                <div class="col-md-2 d-flex">
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <button class="text-white bg-danger">x</button>
                    </form>
                </div>
                
                
            </div>
            <!-- card -->

          </div>
        </div>
      
      
        @endforeach
        <div class="card">
          <div class="card-body">
          
         <strong>Total: {{ Cart::getTotal() }}</strong>
          </div>
          <hr>
          <form action="{{ route('cmd.store') }}" method="POST">
              @csrf
              <input type="number" name="qyt" value="{{Cart::getTotal() }}" hidden>
              <input type="number" name="user"  value={{Auth::user()->id}} hidden>
         
              <button type="submit" class="btn btn-warning btn-block ">Commander</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
    @endsection