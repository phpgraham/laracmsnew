@if ((count($category->children) > 0) AND ($category->parent_id > 0))
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
<li class="nav-item"><!-- route('menu', ['slug' => $menu->slug]) -->
    <a class="nav-link" href=""><i class="fa fa-circle-o"></i><span>{{ $category->title }}</span></a>
</li>
@endif
