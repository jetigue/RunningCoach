@extends('layouts.user')

@section('content')
<div class="flex flex-col w-full md:px-4 lg:px-8">
    <div class="flex -mt-8 md:m-0 text-gray-700 text-xl md:justify-end">
        <a class="flex items-center" href="/cross-country/time-trials">
            <i class="text-2xl far fa-arrow-alt-circle-left"></i>
            <span class="text-sm pl-2">Go Back</span>
        </a>
    </div>
    <div class="flex flex-col mt-4 md:m-0">
        <p class="text-primary text-2xl md:text-3xl lg:text-4xl font-thin text-center py-2">
            {{ $timeTrial->name }}
        </p>
        <div class="px-4 py-2 border-b border-t border-gray-400">
            <div class="flex flex-wrap justify-between py-1">
                <p class="text-black text-sm md:text-lg lg:text-xl md:pl-0">
                    {{date('F j, Y', strtotime( $timeTrial->trial_date))}}
                </p>
                <p class="text-black text-sm lg:text-lg md:pl-0">
                    {{ $timeTrial->venue->name }}
                </p>
            </div>

            <div class="flex flex-wrap text-gray-700 text-xs md:text-sm justify-between py-1">
                <div class="flex flex-col">
                    <p class="">Timing: <span class="text-black">{{ $timeTrial->timing->name }}</span>
                </div>
                <div class="flex flex-col p-0">

                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <cross-country-time-trial-races
            :data="{{ $timeTrial->races->load('timeTrial', 'gender', 'event') }}">
        </cross-country-time-trial-races>
    </div>

</div>
@endsection
