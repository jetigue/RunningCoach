@include('layouts.header')
@if (Route::has('login'))
    <div class="h-16 bg-white">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif
<div class="min-h-screen md:flex md:flex-col">
    @include('layouts.banner')


</div>
@include('layouts.footer')
