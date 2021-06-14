<!doctype html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
    @include('parts.head')
    @include('parts.styles')
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
@include('parts.topbar')
@include('parts.sidebar')
        <div class="app-content content container-fluid">
            <div class="content-body">
                @include('parts.flash')

                @yield('content')
                </div>
            </div>
        </div>


@include('parts.footer')
@include('parts.scripts')
</body>
</html>
