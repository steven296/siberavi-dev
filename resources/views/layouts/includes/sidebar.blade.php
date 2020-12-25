<!-- Sidebar Holder -->
<nav id="sidebar">
        <a class="navbar-brand ml-4 pt-4" href="#">
            <img src="{{ asset('img/logo-white.svg') }}" width="30" height="30" class="d-inline-block align-top" alt=""> 
            SIBERAVI DEV
        </a>

            <div class="container mt-4 mb-2">
                <div class="mb-2">
                <img src="{{ asset('img/users/user.jpg') }}" class="img-responsive" style="border-radius: 50%;" alt="" width="70">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">Usuario</div>
            </div>
            </div>


    <ul class="list-unstyled components">
        <li>
            <a href="{{ route('home') }}"><i class="fas fa-chart-line"></i> Panel</a>
        </li>

        <li>
            <a href="{{ route('categories.index') }}"><i class="fa fa-file-upload"></i> Categorias</a>
        </li>

        <li>
            <a href="#"><i class="fa fa-image"></i> Galerias</a>
        </li>
        
    </ul>

    <ul class="list-unstyled CTAs">
        <li>
            <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Cerrar sesión</a>
        </li>
    </ul>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>