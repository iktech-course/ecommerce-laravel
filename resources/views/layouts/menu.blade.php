<nav class="navbar navbar-expand-lg navbar-dark mb-4 navbar-fixed-top">
  <div class="container">
    <div class="mav-logo text-white">UKM Sido Makmur</div>
    <!-- <img src="{{ asset('images/KOJO 1.png') }}" href="/" class="img-fluid"> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="mr-auto navbar-nav"></ul>
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ URL::to('product') }}">Produk</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ URL::to('contact') }}">Kontak</a>
          </li> 
          <li class="nav-item active">
            <a class="nav-link" href="{{ URL::to('about') }}">Tentang</a>
          </li>
          <form action="/product" method="GET">
            <input type="search" class="form-search mx-sm-2 rounded-0 shadow-none" placeholder="Search..." name="q" autocomplete="off">
          </form>
          <!-- <li class="nav-item">
            <a class="bi bi-bookmark-fill fa-lg nav-link ml-4" href="{{ URL::to('wishlist') }}"></a>
          </li> -->
          @guest
          <li class="nav-item active">
            <a class="btn btn-white" style="margin-right:5px;" href="{{ URL::to('login') }}">Masuk</a>
          </li>
          <li class="nav-item active">
            <a class="btn btn-outline" href="{{ URL::to('register') }}">Daftar</a>
          </li>
          @endguest
          @auth
          <li class="nav-item">
            <a href="{{ URL::to('profile') }} " class="bi bi-person-circle fa-lg nav-link"><small class="ml-1" >{{ Auth::user()->name }}</small></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="bi bi-arrow-right-square-fill fa-lg nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></a>
          </li>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          @endauth

        </ul>
      </ul>
    </div>
  </div>
</nav>
