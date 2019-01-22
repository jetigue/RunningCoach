@include('layouts.header')
<div class="min-h-screen md:flex md:flex-col">
    @include('layouts.banner')
    <div class="flex flex-col">
        <div class="md:flex md:flex-1">
            <aside class="md:min-h-screen md:w-1/6 md:shadow md:p-2" id="userMenu">
                <div class="text-right md:hidden">
                    <menu-button>
                        <user-menu></user-menu>
                    </menu-button>
                    <portal-target name="menu-modal"></portal-target>
                </div>

                <div class=" md:pl-2 lg:pl-4">
                    @include('layouts.menu')
                </div>
            </aside>

            <main class="md:flex-1 p-2 md:py-6 lg:py-8" id="userContent">
                @yield('content')
            </main>
        </div>
    </div>
</div>
@include('layouts.footer')