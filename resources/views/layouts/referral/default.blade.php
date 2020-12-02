<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.referral.head')
</head>

<body>
    <section class="app">
        <section class="app-aside navbar navbar-dark">
            <div class="sidebar" id="collapsibleNavbar">
                @include('includes.referral.left')
            </div>
            <!-- Left Section End -->
        </section>
        <section class="app-content">
            <!-- Right section Start-->
            <header class="app-header-block">
                @include('includes.referral.header')
            </header>
            <section class="app-body">
                @yield('content')
            </section>
        </section>
    </section>
    @include('includes.referral.script')
</body>

</html>