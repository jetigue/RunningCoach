@extends('layouts.user')

@section('content')
<div class="flex flex-col w-full md:px-4 lg:px-8">
    <div class="flex -mt-8 md:m-0 text-tertiary text-xl md:justify-end">
        <a href="/track-meets"><i class="fas fa-arrow-circle-left"></i> Back</a>
    </div>
    <div class="flex flex-col mt-4 md:m-0">
        <header class="text-primary text-xl md:text-2xl lg:text-4xl">{{ $trackMeet->name->name}}</header>
        <p class="text-secondary text-sm md:text-lg lg:text-2xl pl-4 py-1">
            {{date('F j, Y', strtotime($trackMeet->meet_date))}}
        </p>
        <p class="text-grey-darker text-sm md:text-lg lg:text-2xl pl-4 py-1">
            {{ $trackMeet->venue->name }}
        </p>
    </div>

    <div class="flex flex-wrap bg-grey-light text-secondary text-xs md:text-sm py-1 my-1 md:my-2 justify-around">
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
             <track-team-results :data="{{ $trackMeet->teamResults->load('trackMeet', 'gender', 'division') }}"></track-team-results>
    </div>

</div>



@endsection