<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.calendar.head')
</head>

<body>
    <!-- Header Section Start -->
    @include('includes.header')
    <!-- Header Section End -->
    <!-- Middle Section Start -->
    <section>
        <div class="container">
            <div class="response alert alert-success mt-2" style="display: none;"></div>
            <div id='calendar'></div>
        </div>
        @yield('content')
    </section>
    <!-- Middle Section End -->
    <!-- Footer Section Start -->
    @include('includes.footer')
    <!-- Footer Section End -->
    @include('includes.calendar.script')
</body>

</html>