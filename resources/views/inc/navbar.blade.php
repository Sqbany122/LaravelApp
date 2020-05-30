<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand text-light" href="{{ url('/products') }}">
        LaravelProductApp
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav" style="width: 70%;">
        <!-- Authentication Links -->
        @if (Auth::check() && Auth::user()->hasAnyRole('admin'))
        <li class="nav-item mr-2">
            <a class="nav-link text-light" href="{{ url('/products/create') }}">
                {{ __('Dodaj produkt') }}
            </a>
        </li>
    @endif
        @guest
            <li class="nav-item mr-2">
                <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Logowanie') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Rejestracja') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Wyloguj') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
    {!! Form::open(['action' => 'ProductController@search', 'method' => 'GET', 'class' => 'form-inline my-2 my-lg-0 mr-0 searchMobile']) !!}
        {{ Form::search('search', '', ['class' => 'form-control mr-sm-2 rounded-0', 'style' => 'width: 80%;', 'placeholder' => 'Wyszukiwanie produktów']) }}
        {{ Form::submit('Szukaj', ['class' => 'btn btn-light my-2 my-sm-0 rounded-0']) }}
    {!! Form::close() !!}
  </div>
</nav>