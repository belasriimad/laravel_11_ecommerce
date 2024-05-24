<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">
            Laravel Images Stock
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">
                            <i class="fas fa-sign-in"></i> Login
                        </a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.dashboard')}}">
                            <i class="fas fa-user"></i> {{ auth()->user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <form id="formLogout" action="{{route('logout')}}" method="post">
                            @csrf    
                        </form>
                        <a class="nav-link" href="#"
                            onclick="document.getElementById('formLogout').submit();">
                            <i class="fas fa-sign-out"></i> Logout
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>