@include('layouts.header')
<div class="min-h-screen md:flex md:flex-col">
    <header class="text-center p-4 bg-primary text-white md:py-10 lg:py-12">
        <p class="text-3xl md:text-4xl lg:text-5xl font-thin">Running Coach</p>
    </header>
    <div class="flex flex-col">
        <div class="md:flex md:flex-1">
            <aside class="md:min-h-screen md:w-1/6 md:shadow md:p-2" id="userMenu">
                <div class="text-right md:hidden">
                    <menu-button>
                        <user-menu></user-menu>
                    </menu-button>
                    <portal-target name="menu-modal"></portal-target>
                    <!-- <i class="fas fa-bars text-3xl text-tertiary pt-2 pr-4"></i> -->
                </div>
                <div class="pl-4 pt-6">
                    @include('layouts.menu')
                </div>
                
            </aside>

            <main class="md:flex-1 px-2 -mt-6" id="userContent">
                @yield('content')
            </main>

            <aside class="md:w-1/6">
            </aside>
        </div>
    </div>
</div>
@include('layouts.footer')