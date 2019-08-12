@extends('layouts.user')

@section('content')
    <div class="flex flex-col w-full md:px-4 lg:px-8">
        <div class="flex -mt-8 md:m-0 text-gray-700 text-xl md:justify-end">
            <a href="/cross-country-meets"><i class="far fa-arrow-alt-circle-left"></i> Go Back</a>
        </div>
        <div class="flex flex-col mt-4 md:m-0">
            <header class="text-primary text-xl md:text-2xl lg:text-3xl">{{ $crossCountryMeet->name->name}}</header>
            <p class="text-gray-600 text-sm md:text-lg lg:text-xl pl-4">
                {{date('F j, Y', strtotime($crossCountryMeet->meet_date))}}
            </p>
            <p class="text-gray-800 text-sm md:text-lg lg:text-xl pl-4">
                {{ $crossCountryMeet->venue->name }}
            </p>
        </div>

        <div class="flex flex-wrap bg-gray-200 text-gray-700 text-xs md:text-sm py-1 my-1 md:my-2 rounded-full justify-around">
            <div class="">
                <p>Host: <span class="font-semibold">{{ $crossCountryMeet->host->name }}</span>
            </div>
            <div class="">
                <p>Timing: <span class="font-semibold">{{ $crossCountryMeet->timing->name }}</span>
            </div>
        </div>


        <div class="py-3">
            <cross-country-team-results
                :data="{{ $crossCountryMeet->teamResults->load('crossCountryMeet', 'division', 'event') }}">
            </cross-country-team-results>
        </div>

    </div>
    @endsection
