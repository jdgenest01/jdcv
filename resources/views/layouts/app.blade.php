<!doctype html>
@include("layouts.header")
<body class="h-100">

    <div id="app">
        @include('layouts.navbar')

        <main class="h-100 mt-6">
            <div class="row h-100">
                @if ( Auth::check() )
                <div class="col-2">
                    @include('layouts.sidebar')
                </div>

                @endif
                <div class="{{ ( Auth::check() )?"col-10":"col-12" }}">
                    <div class="container py-4">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('layouts.footer')
</body>
</html>
