<header class="red-checks text-white" id="banner" xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div class="flex w-full lg:h-40 justify-between">

        <div class="flex w-4/5 items-center">
            <div class="hidden md:flex lg:px-12">
                <a href="/"><img src="{{ asset('svg/LonghornLogo.svg') }}" width="150"></a>
            </div>
            <div class="flex-col">
                <p class="text-3xl md:text-4xl lg:text-5xl font-medium pb-1">Longhorn Distance</p>
                <p class="text-xl md:text-2xl lg-text-3xl lg:px-3">Lambert High School Cross Country</p>
            </div>
        </div>

        <div class="flex justify-end pr-2 pt-2 -mb-2 text-xs md:text-sm lg:pr-4 w-1/5">
            @if(Auth::guest())
                <div>
                    <a class="cursor-pointer" href="/login">Sign In</a>
                </div>

            @else
                <user-dropdown align="right" width="200px">

                    <template v-slot:trigger>
                        <button class="text-white hover:font-bold">
                           {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </button>
                    </template>

                    <template v-slot:default>
                        <a class="block hover:bg-smoke-lighter px-4" href="#">Link 1</a>
                        <a class="block hover:bg-smoke-lighter px-4" href="#">Link 2</a>
                        <a class="block hover:bg-smoke-lighter px-4" href="#">Link 3</a>
                        <hr>
                        <a class="block hover:bg-smoke-lighter px-4" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </template>

                </user-dropdown>




            @endif

            {{--<login-button>--}}

            {{--</login-button>--}}
            {{--<portal-target name="login-modal"></portal-target>--}}
        </div>

        <div class="hidden md-flex items-end justify-center">
            <div class="px-2"><p>Our Team</p></div>
            <div class="px-2"><p>Our Events</p></div>
        </div>
        <div>

        </div>
    </div>

</header>