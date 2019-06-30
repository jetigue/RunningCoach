@include('layouts.header')
{{--@if (Route::has('login'))--}}
{{--    <div class="h-16">--}}
{{--        @auth--}}
{{--            <a href="{{ url('/home') }}">Home</a>--}}
{{--        @else--}}
{{--            <a href="{{ route('login') }}">Login</a>--}}

{{--            @if (Route::has('register'))--}}
{{--                <a href="{{ route('register') }}">Register</a>--}}
{{--            @endif--}}
{{--        @endauth--}}
{{--    </div>--}}
{{--@endif--}}
<div class="min-h-screen md:flex md:flex-col">
    @include('layouts.banner')

    <div class="flex md:py-6 lg:py-8 lg:w-3/4 lg:mx-auto justify-between" id="mainContent">

        <div class="flex w-full md:w-2/3 lg:w-1/2 pr-3">
            <main>
                <announcements :data="{{ $announcements }}"></announcements>
            </main>
        </div>

        <div class="flex w-full lg:w-1/3 px-3">
            <article class="card w-full">
                Hello
            </article>
        </div>

        <div class="flex flex-col w-full lg:w-1/6 pl-3">
            <aside class="">
                <events :data="{{ $teamEvents }}"></events>
            </aside>

            <div class="items-center py-4">
                <iframe
                    allowtransparency frameborder='0'
                    height='900' scrolling='no'
                    src='https://www.strava.com/clubs/521687/latest-rides/7d7b03695cf1a188bf1a02e18c1570b36b1d9834?show_rides=true'
                    width='225'>
                </iframe>
            </div>
        </div>









    </div>

</div>
@include('layouts.footer')
