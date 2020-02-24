@extends('layouts.user')

@section('content')
    <div class="flex flex-col w-full md:px-4 lg:px-8">
        <div class="flex -mt-8 md:m-0 text-gray-700 md:justify-end">
            <a class="flex items-center" href="{{$teamResult->trackMeet->path()}}">
                <i class="text-2xl far fa-arrow-alt-circle-left"></i>
                <span class="text-sm pl-2">Go Back</span>
            </a>
        </div>

    <div class="flex flex-col mt-4 md:m-0">
        <p class="text-primary text-2xl md:text-3xl lg:text-4xl font-thin text-center py-2">
            {{ $teamResult->trackMeet->name->name }}
        </p>
        <div class="px-4 py-2 border-b border-t border-gray-400">
            <div class="flex flex-wrap justify-between py-1">
                <p class="text-black text-sm md:text-lg lg:text-xl md:pl-0">
                    {{date('F j, Y', strtotime( $teamResult->trackMeet->meet_date))}}
                </p>
                <p class="text-black text-sm md:text-lg lg:text-xl md:pl-0">
                    {{ $teamResult->trackMeet->venue->name }}
                </p>
            </div>

            <div class="flex flex-wrap text-gray-700 text-xs md:text-sm justify-between py-1">
                <div class="flex flex-col">
                    <p>Host: <span class="text-black">{{ $teamResult->trackMeet->host->name }}</span>
                    <p class="">Timing: <span class="text-black">{{ $teamResult->trackMeet->timing->name }}</span>
                </div>
                <div class="flex flex-col p-0">
{{--                    <a  class="text-sm text-blue-700"--}}
{{--                        href="/cross-country/venues/{{ $teamResult->crossCountryMeet->venue->id }}/boys-records">--}}
{{--                        Boys Records--}}
{{--                    </a>--}}
{{--                    <a  class="text-sm text-blue-700"--}}
{{--                        href="/cross-country/venues/{{ $teamResult->crossCountryMeet->venue->id }}/girls-records">--}}
{{--                        Girls Records--}}
{{--                    </a>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap w-full justify-between py-4">
        <div class="text-gray-800 text-xl md:text-2xl lg:text-3xl py-1 w-full md:w-full">
            {{ $teamResult->division->name }} Results
        </div>
    </div>
    <track-results-container>
        @if(count($results400m) > 0)
            <track-results :data="{{ $results400m }}">400m</track-results>
        @endif

        @if(count($results800m) > 0)
            <track-results :data="{{ $results800m }}">800m</track-results>
        @endif

        @if(count($results1000m) > 0)
            <track-results :data="{{ $results1000m }}">1000m</track-results>
        @endif

        @if(count($results1200m) > 0)
            <track-results :data="{{ $results1200m }}">1200m</track-results>
        @endif

        @if(count($results1500m) > 0)
            <track-results :data="{{ $results1500m }}">1500m</track-results>
        @endif

        @if(count($results1600m) > 0)
            <track-results :data="{{ $results1600m }}">1600m</track-results>
        @endif

        @if(count($results1mile) > 0)
            <track-results :data="{{ $results1mile }}">1 mile</track-results>
        @endif

        @if(count($results3000m) > 0)
            <track-results :data="{{ $results3000m }}">3000m</track-results>
        @endif

        @if(count($results3200m) > 0)
            <track-results :data="{{ $results3200m }}">3200m</track-results>
        @endif

        @if(count($results2mile) > 0)
            <track-results :data="{{ $results2mile }}">2 mile</track-results>
        @endif

        @if(count($results5000m) > 0)
            <track-results :data="{{ $results5000m }}">5000m</track-results>
        @endif

    </track-results-container>

</div>

@endsection

@section('aside')
    <filters>
        <track-event-filter></track-event-filter>
    </filters>
@endsection
