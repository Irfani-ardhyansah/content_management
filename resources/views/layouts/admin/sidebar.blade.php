<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        @if(auth()->user()->role == '0')
            <a href="{{url('/admin/home')}}">Admin</a>
        @else 
            <a href="{{url('/admin/home')}}">Author</a>
        @endif
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        @if(auth()->user()->role == '0')
            <a href="{{url('/admin/home')}}">Admn</a>
        @else 
            <a href="{{url('/admin/home')}}">Athr</a>
        @endif
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Starter</li>
        @if(auth()->user()->role == '0')
            <li class="{{ set_active('author.index') }}"><a class="nav-link" href="{{url('/admin/author')}}"><i class="fas fa-columns"></i> <span>Akun</span></a></li>
        @endif

        <li class="{{ set_active('article.index') }}"><a class="nav-link" href="{{url('/admin/article')}}"><i class="fas fa-columns"></i> <span>Article</span></a></li>
    </ul>
</aside>