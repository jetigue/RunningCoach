<div class="flex flex-col w-full md:w-1/2 lg:w-1/4 py-2">
    <header>
        <p class="text-primary text-2xl">
            {{ $title }}
        </p>
    </header>
    <section>
        <ul class="">
            {{ $slot }}
        </ul>
    </section>

</div>
