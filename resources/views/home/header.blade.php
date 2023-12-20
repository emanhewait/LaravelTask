<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            Post Blog
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#"
                         id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu"
                         aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item"
                                 href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                 Logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}"
                             method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
