@extends('layouts.user')

@section('content')
<div class="flex flex-col w-full">
    <header class="flex justify-between flex-wrap">
        <div class="flex flex-col w-full md:w-3/4">
            <p class="text-primary text-2xl lg:text-5xl">
                {{ $athlete->first_name }} {{ $athlete->last_name }}
            </p>
            <p class="text-gray-700 text-lg lg:text-xl">
                Class of {{ $athlete->grad_year }}
            </p>
        </div>
        @auth
            @if($athlete->trainingGroup->name !== 'None')
                <div class="flex justify-center items-center w-full md:w-1/4 p-4">
                    <profile-training-group :data="{{ $athlete->load('trainingGroup') }}"></profile-training-group>
                </div>

            @endif
        @endauth

    </header>

    <section class="my-10">
        <tabs class="">
            <tab title="Cross Country Results" active>
                @include('partials.athleteCCResults')
            </tab>
            <tab title="Track Results">
                @include('partials.athleteTrackResults')
            </tab>
{{--            <tab title="Time Trials">--}}
{{--                @include('partials.athleteTimeTrialResults')--}}
{{--            </tab>--}}
{{--            @if(Auth::user() && Auth::user()->role->slug === 'coach')--}}
{{--                @include('partials.trainingPaces')--}}
{{--            @endif--}}
            @auth
            <tab title="Training Paces">
                <athlete-training-paces></athlete-training-paces>
            </tab>
            @endauth

        </tabs>
    </section>
</div>

@endsection
