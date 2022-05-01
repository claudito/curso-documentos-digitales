<nav class="navbar navbar-expand-lg navbar-light bg-light">
     
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="navbar-toggler-icon"></span>
    </button> <a class="navbar-brand" href="#">Home</a>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="navbar-nav">
            @guest <!-- Invitado -->
                <!-- Vacio -->
            @else <!-- Login -->
                <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Mantenimientos</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="{{ route('certificados.index') }}">Certificados</a>
                         <a class="dropdown-item" href="#">Tipo de Certificados</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Documentos Digitales</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="#">Contratos</a>
                         <a class="dropdown-item" href="#">Boletas</a>
                         <a class="dropdown-item" href="#">Liquidaciones</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Seguridad</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="#">Usuarios</a>
                         <a class="dropdown-item" href="#">Roles</a>
                         <a class="dropdown-item" href="#">Permisos</a>
                    </div>
                </li>
            @endguest
        </ul>

        <ul class="navbar-nav ml-md-auto">
            @guest
                <li class="nav-item">
                     <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                     <a class="nav-link" href="{{ route('register') }}">Registro</a>
                </li>
            @else
                <li class="nav-item active">
                     <a class="nav-link" href="#">Link <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown"></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="#">Configuraciones</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        >Salir</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>