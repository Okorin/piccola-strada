<!doctype html>
<html lang="{{ App::getLocale() }}">
  <head>
    @include('layouts.css')
	
	@yield('custom-css')

    <title>@yield('title', 'home') &middot; Piccola Strada</title>
  </head>
<body>

    <header>
      @include('layouts.header')
      @include('layouts.navigation')
    </header>

    <main role="main">
      <div class="jumbotron header-img" id="page-header-main">
        <div class="container text-white font-weight-bold">
          <h1 class="display-3 bg-dark rounded py-2 px-4 d-inline-block shadow-lg">@yield('page-title', 'Home')</h1><br />
          <span class="bg-dark px-2 rounded shadow-lg">@yield('page-description')</span>
        </div>
      </div>
      
      <div class="container h-100 bg-light">
          @yield('content')
      </div>
      <!-- FOOTER -->
    </main>
    @include('layouts.footerScripts')
  </body>
</html>