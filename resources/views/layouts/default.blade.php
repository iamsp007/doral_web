<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    @stack('css')
</head>

<body>
    <!-- Header Section Start -->
    @include('includes.header')
    <!-- Header Section End -->
    <!-- Middle Section Start -->
    <section>
        @yield('content')
    </section>
    <!-- Middle Section End -->
    <!-- Footer Section Start -->
    @include('includes.footer')
    <!-- Footer Section End -->
    @include('includes.script')
    @stack('js')
</body>

</html>
