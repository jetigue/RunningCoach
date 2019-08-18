@extends('layouts.user')

@section('content')
<div class="flex flex-col w-full md:px-4 lg:px-8">
    <div class="flex -mt-8 md:m-0 text-gray-700 md:justify-end">
        <a class="flex items-center" href="{{$teamResult->crossCountryMeet->path()}}">
            <i class="text-2xl far fa-arrow-alt-circle-left"></i>
            <span class="text-sm pl-2">Go Back</span>
        </a>
    </div>

    <div class="flex flex-col mt-4 md:m-0">
        <p class="text-primary text-2xl md:text-3xl lg:text-4xl font-thin text-center py-2">
            {{ $teamResult->crossCountryMeet->name->name }}
        </p>
        <div class="px-4 py-2 bg-gray-200 rounded shadow">
            <div class="flex flex-wrap justify-between py-1">
                <p class="text-black text-sm md:text-lg lg:text-xl md:pl-0">
                    {{date('F j, Y', strtotime( $teamResult->crossCountryMeet->meet_date))}}
                </p>
                <p class="text-black text-sm md:text-lg lg:text-xl md:pl-0">
                    {{ $teamResult->crossCountryMeet->venue->name }}
                </p>
            </div>

            <div class="flex flex-wrap text-gray-700 text-xs md:text-sm justify-between py-1">
                <div class="">
                    <p>Host: <span class="text-black">{{ $teamResult->crossCountryMeet->host->name }}</span>
                </div>
                <div class="">
                    <p class="">Timing: <span class="text-black">{{ $teamResult->crossCountryMeet->timing->name }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="text-gray-800 font-light text-2xl lg:text-3xl py-3">
        {{ $teamResult->division->name }} Results
    </div>
    <div class="">
        <cross-country-results :data="{{ $teamResult->results->load('teamResult', 'athlete') }}">
        </cross-country-results>
    </div>

</div>


@endsection
