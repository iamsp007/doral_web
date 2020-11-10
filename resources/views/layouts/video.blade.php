<!DOCTYPE html>
<html>

<head>
    @include('includes.head')
</head>

<body>

    
    <!-- Header -->
    @include('includes.afterheader')
    <!-- End Header -->

    <!-- Video List -->
    <section class="video-player-wrp">
        <div class="video-content">
            <!-- sidebar -->
            @include('includes.sidebar')
            <!-- End Sidebar -->

            <!-- section -->
            @yield('content')
            <!-- end section -->
            
        </div>
    </section>        

    <!-- Footer -->
    @include('includes.footer')
    <!-- End Footer -->

    
    
     @include('includes.script')
    
</body>

</html>