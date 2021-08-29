@extends('layouts.user')

@section('content')
<div class="flex flex-col w-full md:px-4 lg:px-8">
    <div class="flex -mt-8 text-gray-700 md:m-0 md:justify-end">
        <a class="flex items-center" href="{{$teamResult->crossCountryMeet->path()}}">
            <i class="text-2xl far fa-arrow-alt-circle-left"></i>
            <span class="pl-2 text-sm">Go Back</span>
        </a>
    </div>

    <div class="flex flex-col mt-4 md:m-0">
        <p class="py-2 text-2xl font-thin text-center text-primary md:text-3xl lg:text-4xl">
            {{ $teamResult->crossCountryMeet->name->name }}
        </p>
        <div class="px-4 py-2 border-t border-b border-gray-400">
            <div class="flex flex-wrap justify-between py-1">
                <p class="text-sm text-black md:text-lg lg:text-xl md:pl-0">
                    {{date('F j, Y', strtotime( $teamResult->crossCountryMeet->meet_date))}}
                </p>
                <p class="text-sm text-black md:text-lg lg:text-xl md:pl-0">
                    {{ $teamResult->crossCountryMeet->venue->name }}
                </p>
            </div>

            <div class="flex flex-wrap justify-between py-1 text-xs text-gray-700 md:text-sm">
                <div class="flex flex-col">
                    <p>Host: <span class="text-black">{{ $teamResult->crossCountryMeet->host->name }}</span>
                    <p class="">Timing: <span class="text-black">{{ $teamResult->crossCountryMeet->timing->name }}</span>
                </div>
                <div class="flex flex-col p-0">
                    <a  class="text-sm text-blue-700"
                        href="/cross-country/venues/{{ $teamResult->crossCountryMeet->venue->id }}/boys-records">
                        Boys Records
                    </a>
                    <a  class="text-sm text-blue-700"
                        href="/cross-country/venues/{{ $teamResult->crossCountryMeet->venue->id }}/girls-records">
                        Girls Records
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap justify-between w-full py-4">
        <div class="w-full py-1 text-xl text-gray-800 md:text-2xl lg:text-3xl md:w-full">
            {{ $teamResult->division->name }} Results
        </div>

        <div class="w-1/2 text-center md:w-1/3">
            @if ($teamResult->place !== null)
            {{ $teamResult->place }}
            <span class="text-gray-600">
                out of
            </span>
            @endif
             {{ $teamResult->number_teams }}
            <span class="text-gray-600">
                Teams
            </span>
        </div>

        <div class="w-1/2 text-center md:w-1/3">
            {{ $teamResult->number_runners }} <span class="text-gray-600">Total Runners</span>
        </div>
    </div>
    <div class="">
        <cross-country-results :data="{{ $results }}">
        </cross-country-results>
    </div>

</div>


@endsection
