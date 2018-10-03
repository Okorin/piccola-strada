      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Piccola Strada</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ (Route::currentRouteName() === 'home' ? 'active' : '') }}">
              <a class="nav-link" href="{{ url('/home') }}">News <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ (Route::currentRouteName() === 'contact' ? 'active' : '') }}">
              <a class="nav-link" href="{{ route('contact') }}">Kontakt</a>
            </li>
            <li class="nav-item {{ (Route::currentRouteName() === 'products.index' ? 'active' : '') }}">
              <a class="nav-link" href="{{ route('products.index') }}">Karte</a>
            </li>
            <li class="nav-item {{ (Route::currentRouteName() === 'impressum' ? 'active' : '') }}">
              <a class="nav-link" href="{{ route('impressum') }}">Impressum</a>
            </li>
          @auth
            <li class="nav-item {{ (Route::currentRouteName() === 'categories.index' ? 'active' : '') }}">
              <a class="nav-link" href="{{ route('categories.index') }}">Kategorien</a>
            </li>
            <li class="nav-item {{ (Route::currentRouteName() === 'ingredients.index' ? 'active' : '') }}">
              <a class="nav-link" href="{{ route('ingredients.index') }}">Zutaten</a>
            </li>
          @endauth
          </ul>
        @auth
        <form class="form-inline mt-2 mt-md-0" method="POST" action="/logout">
          {{ csrf_field() }}
          <button class="btn btn-outline-success my-2 my-sm-0 btn-dark" type="submit">Logout</button>
        </form>
        @endauth
        </div>
      </nav>