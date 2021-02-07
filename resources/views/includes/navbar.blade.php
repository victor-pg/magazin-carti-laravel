<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark center p-4 justify-content-center nav-fill text-white d-flex justify-content-between bg-transparent">
  <ul class="nav justify-content-center text-light ">
    <li class="nav-item">
      <a class="nav-link  text-white" href="/">Acasa</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="/cart">Cos</a>
    </li>

    @guest
    @if (Route::has('login'))
    <li class="nav-item">
      <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @endif

    @if (Route::has('register'))
    <li class="nav-item">
      <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
    @endif
    @else
  </ul>
  <ul class="nav justify-content-center text-light d-flex flex-column">
    <li class="nav-item">
      <a class="nav-link  lead text-danger">
        {{ Auth::user()->name }}
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        {{ __('Iesise din cont') }}
      </a>
      @if(Auth::user()->name == 'admin')
      <a href="admin" class="nav-item">
        Panou admin
      </a>
      @endif

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </li>
    @endguest
  </ul>

</nav>