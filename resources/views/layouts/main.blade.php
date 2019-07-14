@include('layouts.header')
<div class="min-h-screen md:flex md:flex-col ">
    @include('layouts.banner')

    <div class="container bg-white md:py-2 lg:py-4 mx-auto" id="mainContent">
        @yield('content')
    </div>

</div>

@include('layouts.footer')
