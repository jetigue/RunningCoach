@include('layouts.header')
<div class="min-h-screen md:flex md:flex-col">
    <header class="text-center p-4 bg-primary text-white md:py-10 lg:py-12">
        <p class="text-3xl md:text-4xl lg:text-5xl font-thin">Running Coach</p>
    </header>
    <div class="flex flex-col">
        <div class="md:flex md:flex-1">
            <aside class="md:w-1/6 md:border-r border-primary-dark text-right">
                <i class="fas fa-bars text-3xl text-tertiary pt-2 pr-4"></i>
            </aside>
            <menu-modal></menu-modal>

            <main class="md:flex-1 px-2" id="userContent">
                @yield('content')
            </main>
        </div>
    </div>
</div>
@include('layouts.footer')