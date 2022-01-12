<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <script src="{{ asset('js/main.js') }}" defer></script>
    <title>Mi_Blog - @yield('title')</title>
</head>
<body>
        <!-- Header -->
        <nav class="navbar navbar-light bg-main">
          <div class="container p-2">
            
              <a class="navbar-brand m-auto" href="/">
                <img src="{{asset('images/logo.png')}}" width="130" alt="" loading="lazy">
              </a>
            
              @if (auth()->user()!== null)
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
              </svg>
              <a class="navbar-brand mx-2" aria-current="page" href="/">{{auth()->user()->name}}</a>
              @else
                @if (Route::has('login'))
                      
                  <a class="navbar-brand" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                        <a class="navbar-brand" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
              @endif
             
              <button class="navbar-toggler mx-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <ul class="navbar-nav justify-content-arround flex-grow-1 pe-3">
                        <li class="nav-item">
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.categories')}}"class="nav-link">Admin</a>
                        </li>
                        {{-- BOTON DE LOGUOT --}}
                        @if(auth()->user()!==null)
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                          </form>
                          @endif
                        {{-- BOTON DE LOGUOT --}}
                        {{-- <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                            <li></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                              <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                          </ul> 
                        </li> --}}
                      </ul>
                      {{-- <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form> --}}
                    </div>
                    
                  </div>
                 
            </div>
    </nav>

    <!-- CONTENIDO -->
    @yield('content')

    <!-- Footer -->
    <footer class="container-fluid bg-main">
        <div class="row text-center p-4">
            <div class="mb-3">
                <img src="{{asset('images/logo.png')}}" alt="4Devs logo" width="120" id="logofooter">
            </div>
            <div id="col-md-10">
                <a href="https://www.facebook.com/youdevs">
                    <img src="{{asset('images/facebook.png')}}" class="img-fluid" width="40px" alt="facebook youdevs">
                </a>
                <a href="https://www.instagram.com/youdevs">
                    <img src="{{asset('images/instagram.png')}}" class="img-fluid" width="40px" alt="instagram youdevs">
                </a>
                <a href="https://www.youtube.com/c/YouDevsOficial">
                    <img src="{{asset('images/youtube.png')}}" class="img-fluid" width="40px" alt="youtube youdevs">
                </a>
                <p class="mt-3">Copyright © 2022 4Devs, Blog. <br> Todos los derechos reservados.</p>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>