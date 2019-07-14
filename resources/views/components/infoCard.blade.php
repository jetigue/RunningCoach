<div class="flex flex-col rounded p-4">
    <header>
        <p class="lg:text-3xl md:text-2xl text-lg font-thin">
            {{ $title }}
        </p>
        <div class="primary-line my-1"></div>
    </header>
    <section>
        {{ $slot }}
    </section>
</div>
