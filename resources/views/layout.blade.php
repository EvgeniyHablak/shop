<!-- Stored in resources/views/layouts/app.blade.php -->
<!doctype html>

<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <!-- Optional theme -->

    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->

    <script src="/libs/jquery/jquery-3.3.1.min.js"></script>
    <script src="/libs/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/main.css">
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>

<body>
    <div class="container">
    @include('includes.navbar')
    @include('includes.alert')
    @include('includes.errors') @yield('content')
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="/libs/underscore/underscore.js"></script>
    <script src="/js/tmpl/templates.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>