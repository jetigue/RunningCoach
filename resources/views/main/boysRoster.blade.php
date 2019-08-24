@extends('layouts.main')

@section('content')

<div class="w-full md:w-5/6 p-2 md:px-2 mx-auto min-h-screen">
    <div class="flex flex-col bg-white rounded p-4">

        <header>
            <p class="text-3xl font-thin text-center">
                Boys' Roster
            </p>
            <div class="primary-line my-1"></div>
        </header>

        <section class="w-full py-2">
            <div class="flex flex-wrap justify-center">

                @component('components.classRoster')
                    @slot('title') Seniors @endslot
                    @foreach($seniors as $senior)
                        <li class="text-gray-700 font-semibold py-1">
                            <a href="/athletes/{{$senior->id}}">
                                {{$senior->last_name}}, {{$senior->first_name}}
                            </a>
                        </li>
                    @endforeach
                @endcomponent

                @component('components.classRoster')
                    @slot('title') Juniors @endslot
                        @foreach($juniors as $junior)
                            <li class="text-gray-700 font-semibold py-1">
                                <a href="/athletes/{{$junior->id}}">
                                    {{$junior->last_name}}, {{$junior->first_name}}
                                </a>
                            </li>
                        @endforeach
                @endcomponent

                @component('components.classRoster')
                    @slot('title') Sophomores @endslot
                        @foreach($sophomores as $sophomore)
                            <li class="text-gray-700 font-semibold py-1">
                                <a href="/athletes/{{$sophomore->id}}">
                                    {{$sophomore->last_name}}, {{$sophomore->first_name}}
                                </a>
                            </li>
                        @endforeach
                @endcomponent

                @component('components.classRoster')
                    @slot('title') Freshmen @endslot
                        @foreach($freshmen as $freshman)
                            <li class="text-gray-700 font-semibold py-1">
                                <a href="/athletes/{{$freshman->id}}">
                                    {{$freshman->last_name}}, {{$freshman->first_name}}
                                </a>
                            </li>
                        @endforeach
                @endcomponent

            </div>
        </section>
    </div>
</div>

@endsection
