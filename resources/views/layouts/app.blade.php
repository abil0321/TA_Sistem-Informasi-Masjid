<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head.index')
</head>

<body>
    @include('layouts.header.index')

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        @include('layouts.navbar.index')

        @include('layouts.cover.index')
    </div>
    <!-- Navbar & Hero End -->

    @yield('content')

    @include('layouts.footer.index')
</body>

</html>
