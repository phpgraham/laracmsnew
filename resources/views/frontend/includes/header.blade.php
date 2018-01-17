<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">☰</button>
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler sidebar-minimizer d-md-down-none" type="button">☰</button>

    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('frontend.index') }}"><i class="icon-home"></i></a>
        </li>
    </ul>

    <ul class="nav navbar-nav ml-auto">
        @if ($logged_in_user)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="{{ $logged_in_user->picture }}" class="img-avatar" alt="{{ $logged_in_user->email }}">
                <span class="d-md-down-none">{{ $logged_in_user->full_name }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Heading</strong>
                </div>
                <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> Link<span class="badge badge-info">0</span></a>
                <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Link</a>

                <div class="dropdown-header text-center">
                    <strong>Heading</strong>
                </div>
                <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Link</a>
                <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Link<span class="badge badge-primary">0</span></a>
                <a class="dropdown-item" href="{{ route('frontend.auth.logout') }}"><i class="fa fa-sign-out"></i> {{ __('navs.general.logout') }}</a>
            </div>
        </li>
        @else
            <li class="nav-item px-3">
                <a class="nav-link" href="{{route('frontend.contact')}}" >
                    <i class="fa fa-address-card-o"></i><span class="d-md-down-none"> {{ __('navs.frontend.contact') }}</span></a>
            </li>

            <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('frontend.auth.login') }}">
                    <i class="fa fa-sign-in"></i><span class="d-md-down-none"> Login</span></a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('frontend.auth.register') }}">
                    <i class="fa fa-user-plus"></i><span class="d-md-down-none"> Register</span></a>
            </li>
        @endif

        @if (config('locale.status') && count(config('locale.languages')) > 1)
            <li class="nav-item px-3 dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-language"></i><span class="d-md-down-none"> {{ __('menus.language-picker.language') }}</span>
                </a>
                @include('includes.partials.lang')
            </li>
        @endif
    </ul>

    <button class="navbar-toggler aside-menu-toggler" type="button">☰</button>
</header>
