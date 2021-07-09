<!doctype html>
@include("layouts.header")
<body class="h-100">

    <div id="app">
        @include('layouts.navbar')

        <main class="h-100">
            <div class="row h-100">
                <div class="col-12">
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
