<!-- Left side column. contains the logo and sidebar -->
<div class="sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <nav class="sidebar-nav">

        <!-- Sidebar Menu -->
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('frontend.maps.index') }}"><i class="fa fa-map-o"></i><span>Maps</span></a>
            </li>
            <li class="nav-title">Pages</li>
            <li class="nav-item"><!-- route('menu', ['slug' => $category->slug]) -->
                <a class="nav-link" href="/pages"><i class="fa fa-file-text-o"></i><span>Page</span></a>
            </li>
            <li class="nav-title">Categories</li>
            <!-- TODO need to find icons for menu and do active like backend -->
            @foreach($menus as $category)
                @if ((count($category->children) > 0) AND ($category->parent_id === 0))
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-list"></i><span>{{ $category->title }}</span>
                        </a>
                        <ul class="nav-dropdown-items" >
                        @foreach($category->children as $category)
                            @include('frontend.includes.partials.submenu', $category)
                        @endforeach
                        </ul>
                    </li>
                @else
                    <li class="nav-item"><!-- route('menu', ['slug' => $category->slug]) -->
                        <a class="nav-link" href=""><i class="fa fa-circle-o"></i><span>{{ $category->title }}</span></a>
                    </li>
                @endif
            @endforeach

        </ul><!-- /.sidebar-menu -->
    </nav><!-- /.sidebar -->
</div>
