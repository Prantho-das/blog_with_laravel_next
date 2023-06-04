<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/trix.css") }}">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    @vite('resources/sass/app.scss')
</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('icons/brand.svg#full') }}"></use>
            </svg>
            <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('icons/brand.svg#signet') }}"></use>
            </svg>
        </div>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    
    <script src="{{ asset("js/jquery-3.6.4.min.js") }}"></script>
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset("js/select2.min.js") }}"></script>
    <script src="{{ asset("js/trix.umd.min.js") }}"></script>
    @stack('script')
</body>

</html>
