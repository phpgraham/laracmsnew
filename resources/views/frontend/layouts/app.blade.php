<!DOCTYPE html>
@langrtl
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
@endlangrtl
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    <!-- Styles -->
    @yield('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{ style(mix('css/backend.css')) }}

    @yield('after-styles')
</head>
<body class="{{ config('frontend.body_classes') }}">
    @include('frontend.includes.header')

    <div class="app-body">
        @include('frontend.includes.sidebar')

        <main class="main">
            @include('includes.partials.logged-in-as')


            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        @yield('page-header')
                    </div><!--content-header-->

                    @include('includes.partials.messages')
                    @yield('content')
                </div><!--animated-->
            </div><!--container-fluid-->
        </main><!--main-->

        @include('frontend.includes.aside')
    </div><!--app-body-->

    @include('frontend.includes.footer')

    <!-- JavaScripts -->
    @yield('before-scripts')
    {{ script(mix('js/backend.js')) }}
    @yield('after-scripts')

    @include('includes.partials.ga')
</body>
</html>

