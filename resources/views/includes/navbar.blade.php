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