<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.admin.head')
</head>

<body>
    <div id="loader-wrapper">
        <div class="pulse"></div>
    </div>
    <section class="app">
        <section class="app-aside navbar navbar-dark">
            <div class="sidebar" id="collapsibleNavbar">
                @include('includes.admin.left')
            </div>
            <!-- Left Section End -->
        </section>
        <section class="app-content">
            <!-- Right section Start-->
            <header class="app-header-block">
                @include('includes.admin.header')
            </header>
            <section class="app-body">
                @yield('content')
            </section>
        </section>
    </section>
    @include('includes.admin.script')
</body>

</html>