@extends('layouts.user')

@section('content')
<div class="flex flex-col w-full md:px-4 lg:px-8">
    <div class="flex -mt-8 md:m-0 text-gray-700 text-xl md:justify-end">
        <a class="flex items-center" href="/track/meets">
            <i class="text-2xl far fa-arrow-alt-circle-left"></i>
            <span class="text-sm pl-2">Go Back</span>
        </a>
    </div>
    <div class="flex flex-col mt-4 md:m-0">
        <p class="text-primary text-2xl md:text-3xl lg:text-4xl font-thin text-center py-2">
            {{ $trackMeet->name->name }}
        </p>
        <div class="px-4 py-2 border-b border-t border-gray-400">
            <div class="flex flex-wrap justify-between py-1">
                <p class="text-black text-sm md:text-lg lg:text-xl md:pl-0">
                    {{date('F j, Y', strtotime( $trackMeet->meet_date))}}
                </p>
                <p class="text-black text-sm lg:text-lg md:pl-0">
                    {{ $trackMeet->venue->name }}
                </p>
            </div>

            <div class="flex flex-wrap text-gray-700 text-xs md:text-sm justify-between py-1">
                <div class="flex flex-col">
                    <p>Host: <span class="text-black">{{ $trackMeet->host->name }}</span>
                    <p class="">Timing: <span class="text-black">{{ $trackMeet->timing->name}}</span>
                </div>
                <div class="flex flex-col p-0">
{{--                    <a  class="text-sm text-blue-700"--}}
{{--                        href="/track/venues/{{ $trackMeet->venue->id}}/boys-records">--}}
{{--                        Boys Records--}}
{{--                    </a>--}}
{{--                    <a  class="text-sm text-blue-700"--}}
{{--                        href="/track/venues/{{ $trackMeet->venue->id }}/girls-records">--}}
{{--                        Girls Records--}}
{{--                    </a>--}}
                </div>
            </div>
        </div>
    </div>


    <div class="py-3">
        <track-team-results :data="{{ $trackMeet->teamResults->load('trackMeet', 'division') }}"></track-team-results>
    </div>

</div>



@endsection
