<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">Home <span class="sr-only">(current)</span></a>
      </li>

    </ul>
    <ul class="navbar-nav ml-auto">
      @if (Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.account') }}">Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.logout') }}">Logout</a>
        </li>
      @endif
    </ul>
  </div>
</nav>
