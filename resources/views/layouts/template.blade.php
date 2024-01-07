<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rekap Keterlambatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home.page') }}">Rekap Keterlambatan</a>
            @if(Auth::check())
            @if(Auth::user()->role == "admin")
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title"  id="offcanvasDarkNavbarLabel">Rekap Keterlambatan</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('home.page') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Data Master
                  </a>
                  <ul class="dropdown-menu dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('rombel.index') }}">Data Rombel</a></li>
                    <li><a class="dropdown-item" href="{{ route('rayon.index') }}">Data Rayon</a></li>
                    <li><a class="dropdown-item" href="{{ route('student.index') }}">Data Siswa</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.index') }}">Data User</a></li>
                    </li> </ul>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('keterlambatan.index') }}">Data Keterlambatan</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('keterlambatan.index') }}">Data Keterlambatan</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                    </li>
                    @endif
       
    </div>
</div>
</nav>
                  </ul>
                </li>
              </ul>
              <form class="d-flex mt-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </div>
      </nav>



    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    @stack('script')

</body>
</html>