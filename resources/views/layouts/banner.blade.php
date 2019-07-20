<header class="w-full crimson-carbon-fiber h-24 md:h-32 lg:h-40" id="banner">

    <div class="flex flex-col">
        <div class="flex justify-between items-start lg:justify-end">
            <div class="lg:hidden">
                <main-menu-button></main-menu-button>
                    <portal-target name="main-menu">
                </portal-target>
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
