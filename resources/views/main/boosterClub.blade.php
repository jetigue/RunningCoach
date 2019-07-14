@extends('layouts.main')

@section('content')

<div class="w-full md:w-1/2 lg:w-1/3 p-2 md:px-2 mx-auto h-screen">
    <div
        class="flex flex-col bg-white rounded p-4">
        <header>
            <p class="lg:text-3xl md:text-2xl text-lg font-thin text-center">
                Booster Club Officers
            </p>
            <div class="primary-line my-1"></div>
        </header>
        <section class="w-full">
            <div class="flex justify-between font-semibold py-1">
                <a class="text-blue-600"
                   href="mailto:isabelle@franklinpad.com">
                        Isabelle Franklin
                </a>
                <p>President</p>
            </div>

            <div class="flex justify-between font-semibold py-1">
                <a class="text-blue-600"
                    href="mailto:whitehouse.atl@gmail.com">
                        Patti White
                </a>
                <p>Treasurer</p>
            </div>

        </section>
    </div>
</div>

@endsection
