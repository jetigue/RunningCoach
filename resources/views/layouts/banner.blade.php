<header class="w-full crimson-carbon-fiber h-24 md:h-32 lg:h-40" id="banner">

    <div class="flex flex-col">
        <div class="flex justify-between items-start lg:justify-end">
            <div class="lg:hidden">
                @if(Auth::user() && Auth::user()->role->slug === 'admin')

                    <admin-menu-button></admin-menu-button>

                    <portal-target name="admin-menu"></portal-target>

                @elseif(Auth::user() && Auth::user()->role->slug === 'coach')

                    <coach-menu-button></coach-menu-button>

                    <portal-target name="coach-menu"></portal-target>

                @elseif(Auth::user() && Auth::user()->role->slug === 'athlete')

                    <athlete-menu-button></athlete-menu-button>

                    <portal-target name="athlete-menu"></portal-target>

                @elseif(Auth::user() && Auth::user()->role->slug === 'viewer')

                    <user-menu-button></user-menu-button>

                    <portal-target name="user-menu"></portal-target>

                @else
                    <main-menu-button></main-menu-button>

                    <portal-target name="main-menu"></portal-target>
                @endif
            </div>
            <div class="flex justify-end pt-2 pr-2 lg:pr-4">
                @include('partials.signIn')
            </div>
        </div>


        <div class="flex justify-center lg:justify-start items-start">
            <div class="md:px-6 lg:px-12 leading-tight">
                <p class="text-xl md:text-3xl lg:text-4xl font-medium text-white">
                    <a href="/">Longhorn Distance</a>
                </p>
                <p class="hidden md:inline md:text-lg lg-text-3xl md:px-0 lg:px-2 text-gray-200">
                    Lambert High School Cross Country
                </p>
            </div>
        </div>
    </div>

    @include('partials.mainMenu')

</header>
