@extends('layouts.user')

@section('content')
<div class="flex flex-col w-full md:px-4 lg:px-8">
    <div class="flex -mt-8 md:m-0 text-gray-700 text-xl md:justify-end">
        <a href="/track-meets"><i class="far fa-arrow-alt-circle-left"></i> Go Back</a>
    </div>
    <div class="flex flex-col mt-4 md:m-0">
        <header class="text-primary text-xl md:text-2xl lg:text-3xl">{{ $trackMeet->name->name}}</header>
        <p class="text-gray-600 text-sm md:text-lg lg:text-xl pl-4">
            {{date('F j, Y', strtotime($trackMeet->meet_date))}}
        </p>
        <p class="text-gray-800 text-sm md:text-lg lg:text-xl pl-4">
            {{ $trackMeet->venue->name }}
        </p>
    </div>

    <div class="flex flex-wrap bg-grey-light text-gray-700 text-xs md:text-sm py-1 my-1 md:my-2 justify-around">
        <div class="">
            <p><span class="font-semibold">{{ $trackMeet->host->name }}</span>
        </div>
        <div class="">
            <p><span class="font-semibold">{{ $trackMeet->season->name }}</span>
        </div>

        <div class="">
            <p><span class="font-semibold">{{ $trackMeet->timing->name }} Timing</span>
        </div>
    </div>


    <div class="py-3">
             <track-team-results :data="{{ $trackMeet->teamResults->load('trackMeet', 'division') }}"></track-team-results>
    </div>

</div>



@endsection
