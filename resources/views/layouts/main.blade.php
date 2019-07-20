@include('layouts.header')
<div class="min-h-screen md:flex md:flex-col ">
    @include('layouts.banner')

    <div class="container bg-white mx-auto" id="mainContent">
        <div class="flex">
            @auth
                <div class="min-h-full hidden lg:flex lg:w-1/6 lg:pl-4 shadow px-2 pt-8">
                    @include('layouts.menu')
                </div>

                <div class="w-full lg:w-5/6">
                    @yield('content')
                </div>
            @endauth

            @guest
                @yield('content')
            @endguest
        </div>
    </div>

</div>

@include('layouts.footer')
