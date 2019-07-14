@extends('layouts.main')

@section('content')

<div class="w-full md:w-3/4 p-2 md:px-2 mx-auto min-h-screen">
    <div class="flex flex-col bg-white rounded p-4">
        <header>
            <p class="lg:text-3xl md:text-2xl text-lg font-thin text-center">
                Girls' Roster
            </p>
            <div class="primary-line my-1"></div>
        </header>
        <section class="w-full py-4">
            <div class="flex flex-wrap justify-center">

                <div class="flex flex-col w-full md:w-1/2 lg:w-1/4 ">
                    <p class="text-primary text-2xl font-thin">Seniors</p>
                    <ul class="">
                        @foreach($seniors as $senior)
                        <li class="text-gray-800 text-lg py-1">
                            <a href="#">
                                {{$senior->last_name}}, {{$senior->first_name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex flex-col w-full md:w-1/2 lg:w-1/4">
                    <p class="text-primary text-2xl font-thin">Juniors</p>
                    <ul class="">
                        @foreach($juniors as $junior)
                        <li class="text-gray-800 text-lg py-1">
                            <a href="#">
                                {{$junior->last_name}}, {{$junior->first_name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex flex-col w-full md:w-1/2 lg:w-1/4">
                    <p class="text-primary text-2xl font-thin">Sophomores</p>
                    <ul class="">
                        @foreach($sophomores as $sophomore)
                        <li class="text-gray-800 text-lg py-1">
                            <a href="#">
                                {{$sophomore->last_name}}, {{$sophomore->first_name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex flex-col w-full md:w-1/2 lg:w-1/4">
                    <p class="text-primary text-2xl font-thin">Freshmen</p>
                    <ul class="">
                        @foreach($freshmen as $freshman)
                        <li class="text-gray-800 text-lg py-1">
                            <a href="#">
                                {{$freshman->last_name}}, {{$freshman->first_name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>



            </div>

        </section>
    </div>
</div>

@endsection
