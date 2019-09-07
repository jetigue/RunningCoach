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
            <tab title="Training Paces">
                @if($seasonBest5k)
                <athlete-training-paces :data="{{ $seasonBest5k }}"></athlete-training-paces>
                @else
                <p>No 5k Results To Base Training Paces on This Season</p>
                @endif
            </tab>
        </tabs>
    </section>
</div>

@endsection
