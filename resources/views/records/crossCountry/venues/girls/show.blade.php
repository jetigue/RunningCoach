@extends('layouts.user')

@section('content')
<div class="flex flex-col w-full">
    <header>
        <p class="text-primary text-2xl lg:text-5xl">
            {{ $venue->name }}
        </p>
        <div class="flex justify-between items-center">
            <div class="flex flex-col">
                <p class="text-gray-700 text-lg lg:text-3xl">
                    Girls Records
                </p>
                <a class="text-xs text-blue-700"
                    href="/cross-country-venues/{{$venue->id}}/boys-records">
                    See Boys Records
                </a>
            </div>
            <a class="flex items-center text-gray-700" href="/cross-country-venues">
                <i class="text-2xl far fa-arrow-alt-circle-left"></i>
                <span class="text-sm pl-2">All Venues</span>
            </a>
        </div>
    </header>

    <section class="my-10">
        <tabs>
            <tab title="Fastest 50 All-Time" active>
                <venue-records :data="{{ $fastestGirls }}"></venue-records>
            </tab>
{{--            <tab title="Fastest 50 Seniors"></tab>--}}
{{--            <tab title="Fastest 50 Juniors"></tab>--}}
{{--            <tab title="Fastest 50 Sophomores"></tab>--}}
{{--            <tab title="Fastest 50 Freshmen"></tab>--}}
        </tabs>
    </section>
</div>
    @endsection
