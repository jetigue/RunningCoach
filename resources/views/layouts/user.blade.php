@include('layouts.header')
<div class="min-h-screen md:flex md:flex-col w-full">
    @include('layouts.banner')
    <div class="container mx-auto">
        <div class="md:flex">
            <aside class="md:min-h-screen md:w-1/5 lg:w-1/6 border-gray-200 border-r-2"
                   id="userMenu">

                    @include('layouts.menu')
            </aside>

            <div class="flex w-full h-full md:w-4/5 lg:w-5/6 p-2" id="userContent">
                <main class="flex w-full p-4 lg:p-6 ">
                    @yield('content')
                </main>

                <portal-target name="create-modal"></portal-target>
                <portal-target name="filter-modal"></portal-target>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
