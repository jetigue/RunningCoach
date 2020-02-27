@extends('layouts.user')

@section('content')
<div class="flex flex-col w-full">
    <header>
        <p class="text-primary text-2xl lg:text-5xl">
            {{ $athlete->first_name }} {{ $athlete->last_name }}
        </p>
        <p class="text-gray-700 text-lg lg:text-xl">
            Class of {{ $athlete->grad_year }}
        </p>
    </header>

    <section class="my-10">
        <tabs class="">
            <tab title="Cross Country Results">
                @include('partials.athleteCCResults')
            </tab>
            <tab title="Track Results" active>
                @include('partials.athleteTrackResults')
            </tab>
{{--            <tab title="Time Trials">--}}
{{--                @include('partials.athleteTimeTrialResults')--}}
{{--            </tab>--}}

            @if(count($seasonBestCC5k) > 0)
                <tab title="5k Training Paces">
                    <athlete-training-paces :data="{{ $seasonBestCC5k }}"></athlete-training-paces>
                </tab>
            @endif
            @if(count($seasonBest1500m) > 0)
                <tab title="1500m Training Paces">
                    <athlete-training-paces :data="{{ $seasonBest1500m }}"></athlete-training-paces>
                </tab>
            @endif
            @if(count($seasonBest1600m) > 0)
                <tab title="1600m Training Paces">
                    <athlete-training-paces :data="{{ $seasonBest1600m }}"></athlete-training-paces>
                </tab>
            @endif
            @if(count($seasonBest3200m) > 0)
                <tab title="3200m Training Paces">
                    <athlete-training-paces :data="{{ $seasonBest3200m }}"></athlete-training-paces>
                </tab>
            @endif

        </tabs>
    </section>
</div>

@endsection
