<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сайт с курсами</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .background-particles{
            background-color: #333;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <!-- particles.js container -->
    <canvas class="background-particles"></canvas>
    {{-- навигация --}}
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">HoPe.inc | OZ</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Меню сайта</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('user.login') }}">Войти</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
              </ul>
              <form class="d-flex mt-3" action="{{ route('search') }}" method="POST" role="search">
                @csrf
                <input class="form-control me-2" type="search" name="query" placeholder="Поиск по сайту" aria-label="Search" required>
                <button class="btn btn-success" type="submit">Поиск</button>
              </form>            
            </div>
          </div>
        </div>
    </nav>
    {{-- навигация --}}

    @yield('contanier')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    {{-- Particle JS--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js" 
    integrity="sha512-jq8sZI0I9Og0nnZ+CfJRnUzNSDKxr/5Bvha5bn7AHzTnRyxUfpUArMzfH++mwE/hb2efOo1gCAgI+1RMzf8F7g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.js" 
    integrity="sha512-BgV3bZfMmUklIZI+dP0SILdmQ0RBY2gxegFFyfgo4Ui56WhKF4Pny9LsV/l96jxDDA+2w47zAXA4IyHo2UT/Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        window.onload = function() {
            var particles = Particles.init({
                selector: '.background-particles',
                color: ['#DA0463', '#404B69'],
                connectParticles: true,
                maxParticles: 350, // Увеличиваем количество частиц
                speed: 1.5, // Увеличиваем скорость частиц
                responsive: [{
                    breakpoint: 100,
                    options: {
                        color: '#00C9B1',
                        maxParticles: 10, // Увеличиваем количество частиц для меньших экранов
                        connectParticles: false
                    }
                }]
            });
        }
    </script>
</body>
</html>