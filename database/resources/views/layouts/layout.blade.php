<!DOCTYPE html>

<html>

<head>

    <title>Quicallerie General</title>

    <link href="{{asset('css/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body>
     
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"> <h2>Quicallerie General</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('products.index')}}"><h3>produit</h3> <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('vente.index')}}"><h3>vente</h3></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><h3>client</h3></a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">

    @yield('content')

</div>
</body>


<div>
        <script> src="{{asset('css/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    
       
   </div>
</html>