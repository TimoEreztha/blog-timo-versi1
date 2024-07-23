<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/admin') }}">Dashboard Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/admin') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item">
                <a href="{{ url('admin') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ url('articel') }}" class="nav-link"><i class="fas fa-newspaper"></i><span>Articles</span></a>
            </li>
            @if (auth()->user()->role == 'admin')
                
            <li class="nav-item">
                <a href="{{ url('category') }}" class="nav-link"><i class="fas fa-folder"></i><span>Category</span></a>
            </li>
            @endif
            <li class="nav-item">
                <a href="{{ url('users') }}" class="nav-link"><i class="fas fa-users"></i><span>Users</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ url('config') }}" class="nav-link"><i class="fas fa-list"></i><span>Config</span></a>
            </li>
            <li class="nav-item">

                                    <a href="{{ route('logout') }}"  class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
            </li>
        </ul>
    </aside>
</div>