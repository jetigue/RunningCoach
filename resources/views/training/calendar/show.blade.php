@extends('layouts.user')

@section('content')
    <div class="flex flex-col w-full -mt-8 md:mt-0">
        <header class="w-full">
            <div class="text-sm text-smoke-600 text-right mb-4">
                <a href="/training-calendar/{{$calendar->month_name}}/{{$calendar->year}}"
                   class="hover:no-underline hover:font-bold hover:text-green-500">
                    View Calendar
                    <i class="fas fa-calendar-alt"></i>
                </a>
            </div>
            <div class="flex w-full justify-between items-center">
                <div class="text-lg text-smoke-400">
                    <a href="/training-calendar/{{ Carbon\Carbon::parse($calendar->calendar_date)
                        ->subDay()->format('Y-m-d') }}"
                        class="hover:no-underline hover:font-bold hover:text-green-500">
                        <i class="far fa-arrow-alt-circle-left"></i>
                        <span class="inline md:hidden">
                            {{ Carbon\Carbon::parse($calendar->calendar_date)->subDay()->format('jS') }}
                        </span>
                        <span class="hidden md:inline lg:hidden">
                            {{ Carbon\Carbon::parse($calendar->calendar_date)->subDay()->format('F jS') }}
                        </span>
                        <span class="hidden lg:inline">
                            {{ Carbon\Carbon::parse($calendar->calendar_date)->subDay()->format('F jS, Y') }}
                        </span>

                    </a>
                </div>
                <div class="text-primary font-light text-4xl">
                    <span class="inline md:hidden">
                        {{ Carbon\Carbon::parse($calendar->calendar_date)->format('jS') }}
                    </span>
                    <span class="hidden md:inline lg:hidden">
                        {{ Carbon\Carbon::parse($calendar->calendar_date)->format('F jS') }}
                    </span>
                    <span class="hidden lg:inline">
                        {{ Carbon\Carbon::parse($calendar->calendar_date)->format('F jS, Y') }}
                    </span>
                </div>
                <div class="text-lg text-smoke-400">
                    <a href="/training-calendar/{{ Carbon\Carbon::parse($calendar->calendar_date)
                        ->addDay()->format('Y-m-d') }}"
                        class="hover:no-underline hover:font-bold hover:text-green-500">
                        <span class="inline md:hidden">
                            {{ Carbon\Carbon::parse($calendar->calendar_date)->addDay()->format('jS') }}
                        </span>
                        <span class="hidden md:inline lg:hidden">
                            {{ Carbon\Carbon::parse($calendar->calendar_date)->addDay()->format('F jS') }}
                        </span>
                        <span class="hidden lg:inline">
                            {{ Carbon\Carbon::parse($calendar->calendar_date)->addDay()->format('F jS, Y') }}
                        </span>
                        <i class="far fa-arrow-alt-circle-right"></i>
                    </a>
                </div>
            </div>
        </header>
        @if(Auth::user() && Auth::user()->role->slug === 'coach')
        <section class="py-4">
            <div class="lg:w-40 h-40 relative border flex mx-auto">
                <div class="absolute w-full text-center inset-x-0 bottom-0 text-smoke-100">Calendar Preview</div>
                <training-calendar-workouts :data="{{ $workouts->load('trainingGroup') }}">
                    {{ Carbon\Carbon::parse($calendar->calendar_date)->format('j') }}
                </training-calendar-workouts>
            </div>
        </section>
        @endif
        <section class="p-4">
            <primary-workout
                :cool-down="{{ $primaryCoolDown->load('runType', 'intensity') }}"
                :interval-run="{{ $primaryIntervalRuns->load('runType', 'intensity') }}"
                :steady="{{ $primarySteadyRuns->load('runType', 'intensity') }}"
                :warm-up="{{ $primaryWarmUp->load('runType', 'intensity') }}">
            </primary-workout>
{{--            <secondary-workout class="py-2"--}}
{{--                :cool-down="{{ $secondaryCoolDown->load('runType', 'intensity') }}"--}}
{{--                :interval-run="{{ $secondaryIntervalRuns->load('runType', 'intensity') }}"--}}
{{--                :steady="{{ $secondarySteadyRuns->load('runType', 'intensity') }}"--}}
{{--                :warm-up="{{ $secondaryWarmUp->load('runType', 'intensity') }}">--}}
{{--            </secondary-workout>--}}
{{--            <supplement-workouts class="py-2"></supplement-workouts>--}}
        </section>

    </div>

@endsection
