<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
        <a class="nav-link" href="#">Galeri</a>
        <a class="nav-link" href="#">Pricing</a>
      </div>
      @if (Auth::check())
        <div class="dropdown">
          <a class="btn text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            {{ Auth::user()->nama }}
          </a>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <hr>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </div>
      @else
        <div>
          <a href="{{ route('login.index') }}" class="btn btn-info text-white">Login</a>
        </div>
      @endif
    </div>
  </div>
</nav>
