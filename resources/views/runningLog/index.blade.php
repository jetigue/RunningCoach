@extends('layouts.user')

@section('content')

<div class="flex flex-col w-full px-2 md:px-4">
    <div class="flex justify-between items-center">
        <div class="text-3xl text-primary font-thin mb-2">
            Running Log
        </div>
        <div class="">
        </div>
    </div>

    <div class="flex w-full shadow-md bg-white justify-between items-center rounded-lg mb-8 flex-wrap py-2">
        <div class="flex flex-col justify-center items-center p-4 leading-tight">
            <p class="uppercase text-xs font-gray-600">Total Mileage</p>
            <p class="uppercase text-2xl font-semibold font-gray-800">{{ $totalMileage }}</p>
        </div>

        <div class="flex flex-col justify-center items-center p-4 leading-tight">
            <p class="uppercase text-xs font-gray-600">Summer Mileage</p>
            <p class="uppercase text-2xl font-semibold font-gray-800">{{ $totalSummerMileage }}</p>
        </div>

        <div class="flex flex-col justify-center items-center p-4 leading-tight">
            <p class="uppercase text-xs font-gray-600">Miles this Week</p>
            <p class="uppercase text-2xl font-semibold font-gray-800">{{ $totalMileageThisWeek }}</p>
        </div>

        <div class="flex flex-col justify-center items-center p-4 leading-tight">
            <p class="uppercase text-xs font-gray-600">Miles this Month</p>
            <p class="uppercase text-2xl font-semibold font-gray-800">{{ $totalMileageThisMonth }}</p>
        </div>

        <div class="flex flex-col justify-center items-center p-4 leading-tight">
            <p class="uppercase text-xs font-gray-600">Miles this Year</p>
            <p class="uppercase text-2xl font-semibold font-gray-800">{{ $totalMileageThisYear }}</p>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row w-full">
        <div class="w-full lg:w-2/3 pr-2">
            @component('components.userTables')
                <running-logs :data="{{ $runningLogs }}"></running-logs>
            @endcomponent
        </div>

        <div class="flex flex-col w-full lg:w-1/3 pl-4 pt-8">
            <div class="w-full shadow rounded-lg bg-white mb-4">
                <bar-graph
                    :labels="[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]"
                    :values="{{$weeklySummerMileage->values()}}"
                    :color="'#333'"
                    :title="'Summer Mileage per Week'">
                </bar-graph>
            </div>

            <div class="w-full p-2 shadow rounded-lg bg-white">
                <bar-graph
                    :labels="{{$mileageLastWeek->keys()}}"
                    :values="{{$mileageLastWeek->values()}}"
                    :color="'#73000A'"
                    :title="'Mileage the Last 7 Days'">
                </bar-graph>
            </div>
        </div>

    </div>
</div>

@endsection


