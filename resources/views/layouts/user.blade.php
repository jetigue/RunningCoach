@include('layouts.header')
<div class="min-h-screen md:flex md:flex-col">
    @include('layouts.banner')
    <div class="flex w-full">
        <div class="md:flex  w-full">
            <aside class="md:min-h-screen md:w-1/5 lg:w-1/6 md:shadow md:p-2" id="userMenu">
                <div class="text-right md:hidden">
                    <menu-button>
                        <user-menu></user-menu>
                    </menu-button>
                    <portal-target name="menu-modal"></portal-target>
                </div>
                <div class="min-h-full md:pl-2 lg:pl-4">
                    @include('layouts.menu')
                </div>
            </aside>

            <div class="flex w-full h-full p-2 md:py-6 lg:py-8" id="userContent">
                <main class="flex w-full lg:w-5/6">
                    @yield('content')
                </main>

                <aside class="hidden lg:flex lg:w-1/6 lg:pl-6 lg:pt-10">
                    @yield('aside')
                </aside>

                <portal-target name="create-modal"></portal-target>
                <portal-target name="filter-modal"></portal-target>
            </div>

        </div>
    </div>
</div>
@include('layouts.footer')
