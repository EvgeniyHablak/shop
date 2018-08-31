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
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('index') }}">Logo</a>
                <ul class="nav navbar-nav">
                    @foreach ($categories as $category) @if ($title === $category->title)
                    <li class="active"><a href="{{ route('categories.show', ['category' => $category->name]) }}">{{ $category->title }}</a></li>
                    @else
                    <li><a href="{{ route('categories.show', ['category' => $category->name ]) }}">{{ $category->title }}</a></li>
                    @endif @endforeach
                </ul>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="search-input">
                        <form class="navbar-form navbar-left" id="search-form" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search" name="search" id="search-input" data-search-url="{{ route('search') }}"
                                    autocomplete="off">
                            </div>
                        </form>
                        <div class="search-block-wrapper">
                            <ul class="list-group search-list">
                            </ul>
                        </div>
                    </div>

                    @guest
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('favorite.index') }}">Favorite</a></li>
                        <li><a href="{{ route('comparison.index') }}">Comparison Page</a></li>
                    </ul>
                    @endGuest
                    <ul class="nav navbar-nav navbar-right">
                        @guest
                        <li><a href="{{ route('login') }}">Sign in</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('dashboard') }}">My account</a></li>
                                <li><a href="{{ route('favorite.index') }}">Favourite</a></li>
                                <li><a href="{{ route('comparison.index') }}">Comparison page</a></li>

                                @if (auth()->user()->hasPermission('admin') || auth()->user()->hasPermission('manager'))
                                <li role="separator" class="divider"></li>

                                <li><a href="{{ route('admin.users') }}">Users</a></li>
                                <li><a href="{{ route('admin.categories') }}">Categories</a></li>
                                <li><a href="{{ route('admin.products') }}">Products</a></li>
                                @endif

                                <li role="separator" class="divider"></li>

                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                        @endGuest
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>

            <!-- /.container-fluid -->
        </nav>
        @if(session()->has('alertMessage'))
        <div class="alert alert-danger">{{ session('alertMessage') }}</div>
        @endif @yield('content')
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/main.js"></script>
</body>

</html>