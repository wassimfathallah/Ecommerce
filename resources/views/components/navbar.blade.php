<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('products.index')}}">E-Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('products.index')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('products.index')}}">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Actions 
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="{{route('categories.create')}}">New Category</a></li>
              <li><a class="dropdown-item" href="{{route('products.create')}}">New Product</a></li>
             </ul>
          </li>
        </ul>
      </div>
    </div>
    @if (Route::has('login'))
    <div class="nav-link">
        @auth

        @php
            $dashboardRoute=(Auth::user()->getRedirectRoute());
        @endphp
        
            <a href="{{ route("$dashboardRoute") }}" class="nav-link">Dashboard</a>
            <a href="{{ route("logout") }}" class="nav-link">logout</a>
            @else
            <a href="{{ route('login') }}" class="nav-link">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            @endif
        @endauth
    </div>
@endif
  </nav>