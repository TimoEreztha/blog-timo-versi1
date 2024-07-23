<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">BLOG PRIBADI SAYA</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('view') }}">ARTICEL</a>
                </li>
               <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            CATEGORY
          </a>
          <ul class="dropdown-menu">
            @foreach ($categories as  $category)
            <li><a class="dropdown-item" href="{{ route('category.articel',$category->slug) }}">{{ $category->name }}</a></li>
            @endforeach
            
          </ul>
            <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">CONTACT</a>
                </li>
        </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
