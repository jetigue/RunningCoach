<header class="pb-5 bg-primary text-white md:pb-6 md:pt-1" id="banner">
    <div class="flex flex-col">
        <div class="text-right pr-2 pt-2 -mb-2 text-xs md:text-sm lg:pr-4">
@if(Auth::guest())
            <a href="/login">Sign In</a>
@else
                <div class="flex flex-col">
                    <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
@endif

            {{--<login-button>--}}

            {{--</login-button>--}}
            {{--<portal-target name="login-modal"></portal-target>--}}
        </div>
        <div class="flex-col">
            <p class="text-center text-3xl md:text-4xl lg:text-5xl font-thin py-2">Longhorn Distance</p>
            <p class="text-center text-xl md:text-2xl lg-text-3xl">Lambert High School</p>
        </div>

        <div class="hidden md-flex items-end justify-center">
            <div class="px-2"><p>Our Team</p></div>
            <div class="px-2"><p>Our Events</p></div>
        </div>
        <div>

        </div>
    </div>

</header>