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
                <tab title="Cross Country Results" active>
                    <athlete-cross-results :data="{{ $crossResults }}"></athlete-cross-results>
                </tab>
                <tab title="Training Paces">
                    <p>Coming Soon</p>
                </tab>
            </tabs>
        </section>
    </div>

@endsection
