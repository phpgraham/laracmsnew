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
        {{ style(mix('css/frontend.css')) }}
        @yield('after-styles')
    </head>
    <body class="skin-{{ config('frontend.theme') }} {{ config('frontend.layout') }}">

        <div class="wrapper">
            @include('frontend.includes.header_no_sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content" id="main-content">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('page-header')

                    {{-- Change to Breadcrumbs::render() if you want it to error to remind you to create the breadcrumbs for the given route --}}
                    {!! Breadcrumbs::renderIfExists() !!}
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="loader" style="display: none;">
                        <div class="ajax-spinner ajax-skeleton"></div>
                    </div><!--loader-->

                    @include('includes.partials.messages')
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            @include('frontend.includes.footer')
        </div><!-- ./wrapper -->

        <!-- JavaScripts -->
        @yield('before-scripts')
        {{ Html::script(mix('js/backend.js')) }}
        @yield('after-scripts')
        <script language="javascript">
            $(function () {
                //fix footer width and margin if no sidebar
                $('.main-footer').css('margin-left', '0px');
                $('#main-content').css('padding-bottom', '100px');
            });
        </script>
        @include('includes.partials.ga')
    </body>
</html>

