<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid"> 
        <a class="navbar-brand" href="#">ManyToMany App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.list') }}">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('course.list') }}">Courses</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @guest
                <li>
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>
                <li><a href=" {{ route('login') }}" class="nav-link"> login</a></li>
                @else
                <li><a href=" {{ route('logout') }}" class="nav-link">Logout</a></li>
                @endguest

        </div>
    </div>
</nav>