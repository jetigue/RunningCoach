@extends('layouts.user')

@section('content')
<div class="flex flex-col w-full md:px-4 lg:px-8">
    <div class="flex -mt-8 md:m-0 text-gray-700 md:justify-end">
        <a class="flex items-center" href="{{$race->timeTrial->path()}}">
            <i class="text-2xl far fa-arrow-alt-circle-left"></i>
            <span class="text-sm pl-2">Go Back</span>
        </a>
    </div>

    <div class="flex flex-col mt-4 md:m-0">
        <p class="text-primary text-2xl md:text-3xl lg:text-4xl font-thin text-center py-2">
            {{ $race->timeTrial->name}}
        </p>
        <div class="px-4 py-2 border-b border-t border-gray-400">
            <div class="flex flex-wrap justify-between py-1">
                <p class="text-black text-sm md:text-lg lg:text-xl md:pl-0">
                    {{date('F j, Y', strtotime( $race->timeTrial->trial_date))}}
                </p>
                <p class="text-black text-sm md:text-lg lg:text-xl md:pl-0">
                    {{ $race->timeTrial->venue->name }}
                </p>
            </div>

            <div class="flex flex-wrap text-gray-700 text-xs md:text-sm justify-between py-1">
                <div class="flex flex-col">
                    <p class="">Timing: <span class="text-black">{{ $race->timeTrial->timing->name }}</span>
                </div>
                <div class="flex flex-col p-0">

                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap w-full justify-between py-4">
        <div class="text-gray-800 text-xl md:text-2xl lg:text-3xl py-1 w-full md:w-full">
            {{ $race->gender->name }} {{ $race->event->name }} Results
        </div>
    </div>
    <div class="">
        <cross-country-time-trial-race-results :data="{{ $results }}">
        </cross-country-time-trial-race-results>
    </div>

</div>


@endsection
