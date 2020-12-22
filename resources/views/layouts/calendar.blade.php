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
        <!-- Large modal -->
        <button class="btn btn-lg btn-primary">Large modal</button>

        <div id="largeModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Large Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Add the <code>.modal-lg</code> class on <code>.modal-dialog</code> to create this large modal.</p>
                    </div>                    
                </div>
            </div>
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