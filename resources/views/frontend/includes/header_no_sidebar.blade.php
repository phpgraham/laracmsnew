<header class="main-header">

    <a href="{{ route('frontend.index') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
           {{ substr(app_name(), 0, 1) }}
        </span>

        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            {{ app_name() }}
        </span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                @if (config('locale.status') && count(config('locale.languages')) > 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-language"></i> {{ trans('menus.language-picker.language') }} <span class="caret"></span>
                        </a>
                        @include('includes.partials.lang')
                    </li>
                @endif

                @if ($logged_in_user)
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ $logged_in_user->picture }}" class="user-image" alt="User Avatar"/>
                        <span class="hidden-xs">{{ $logged_in_user->name }}</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ $logged_in_user->picture }}" class="img-circle" alt="User Avatar" />
                            <p>
                                {{ $logged_in_user->name }}
                                <small>{{ trans('strings.frontend.general.member_since') }} {{ $logged_in_user->created_at->format("m/d/Y") }}</small>
                            </p>
                        </li>

                        <li class="user-body">
                            <div class="col-xs-6 text-center">
                                @permission('view-backend')
                                    {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}
                                @endauth
                            </div>
                            <div class="col-xs-6 text-center">
                                {{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => active_class(Active::checkRoute('frontend.user.account')) ]) }}
                            </div>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{!! route('frontend.index') !!}" class="btn btn-default btn-flat">
                                    <i class="fa fa-home"></i>
                                    {{ trans('navs.general.home') }}
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="{!! route('frontend.auth.logout') !!}" class="btn btn-danger btn-flat">
                                    <i class="fa fa-sign-out"></i>
                                    {{ trans('navs.general.logout') }}
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                @else
                    <li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login'), [], ['class' => active_class(Active::checkRoute('frontend.auth.login')) ]) }}</li>

                    @if (config('access.users.registration'))
                        <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register'), [], ['class' => active_class(Active::checkRoute('frontend.auth.register')) ]) }}</li>
                    @endif
                @endif

            </ul>
        </div><!-- /.navbar-custom-menu -->
    </nav>
</header>
