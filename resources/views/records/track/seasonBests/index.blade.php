@extends('layouts.main')

@section('content')
    <div class="flex flex-col w-full mb-8">
        <header class="md:mb-4">
            <div class="text-3xl md:text-5xl text-primary font-thin text-center p-4">
                Season Best Performances
            </div>
            <div class="hidden md:flex w-full">
                <div class="flex flex-col w-2/5">
                    <div class=" text-center text-3xl text-smoke-600 font-italic">
                        Boys
                    </div>
                </div>

                <div class="w-1/5"></div>
                <div class="flex flex-col w-2/5">
                    <div class="text-center text-3xl text-smoke-600 font-italic">
                        Girls
                    </div>
                </div>
            </div>
        </header>

        <main class="flex flex-col flex-wrap w-full">
            @if($results800m)
                <div class="flex flex-wrap content-center md:h-32">
                    <div class="order-2 w-full md:order-1 md:w-2/5 text-center">
                        @if($seasonBestMale800)
                            <event-best-time :data="{{ $seasonBestMale800 }}"></event-best-time>
                        @endif
                    </div>
                    <div class="order-1 md:order-2 flex w-full md:w-1/5 text-lg font-semibold justify-center mb-2 md:mb-0">
                        <a href="/track/season-bests/athletes-season-bests/800m"
                            class="text-blue-700">800m Run</a>
                    </div>
                    <div class="order-3 w-full md:w-2/5 text-center py-0">
                        @if($seasonBestFemale800)
                            <event-best-time :data="{{ $seasonBestFemale800 }}"></event-best-time>
                        @endif
                    </div>
                </div>
            @endif

            @if($results1200m)
                <div class="flex flex-wrap content-center md:h-32 py-6 md:py-0">
                    <div class="order-2 w-full md:order-1 md:w-2/5 text-center mb-2 md:mb-0">
                        @if($seasonBestMale1200)
                            <event-best-time :data="{{ $seasonBestMale1200 }}"></event-best-time>
                        @endif
                    </div>
                    <div class="order-1 md:order-2 flex w-full md:w-1/5 text-lg font-semibold justify-center mb-2 md:mb-0">
                        <a href="/track/season-bests/athletes-season-bests/1200m"
                            class="text-blue-700">1200m Run</a>
                    </div>
                    <div class="order-3 w-full md:w-2/5 text-center">
                        @if($seasonBestFemale1200)
                            <event-best-time :data="{{ $seasonBestFemale1200 }}"></event-best-time>
                        @endif
                    </div>
                </div>
            @endif

            @if($results1500m)
                <div class="flex flex-wrap content-center md:h-32 py-6 md:py-0">
                    <div class="order-2 w-full md:order-1 md:w-2/5 text-center mb-2 md:mb-0">
                        @if($seasonBestMale1500)
                            <event-best-time :data="{{ $seasonBestMale1500 }}"></event-best-time>
                        @endif
                    </div>
                    <div class="order-1 md:order-2 flex w-full md:w-1/5 text-lg font-semibold justify-center mb-2 md:mb-0">
                        <a href="/track/season-bests/athletes-season-bests/1500m"
                            class="text-blue-700">1500m Run</a>
                    </div>
                    <div class="order-3 w-full md:w-2/5 text-center">
                        @if($seasonBestFemale1500)
                            <event-best-time :data="{{ $seasonBestFemale1500 }}"></event-best-time>
                        @endif
                    </div>
                </div>
            @endif

            @if($results1600m)
                <div class="flex flex-wrap content-center md:h-32 py-6 md:py-0">
                    <div class="order-2 w-full md:order-1 md:w-2/5 text-center mb-2">
                        @if($seasonBestMale1600)
                            <event-best-time :data="{{ $seasonBestMale1600 }}"></event-best-time>
                        @endif
                    </div>
                    <div class="order-1 md:order-2 flex w-full md:w-1/5 text-lg font-semibold justify-center mb-2 md:mb-0">
                        <a href="/track/season-bests/athletes-season-bests/1600m"
                            class="text-blue-700">1600m Run</a>
                    </div>
                    <div class="order-3 w-full md:w-2/5 text-center">
                        @if($seasonBestFemale1600)
                            <event-best-time :data="{{ $seasonBestFemale1600 }}"></event-best-time>
                        @endif
                    </div>
                </div>
            @endif

{{--            @if($results1mile->count())--}}
{{--                <div class="flex flex-wrap">--}}
{{--                    <div class="w-2/5 text-center">--}}
{{--                        @if($seasonBestMale1mile->count())--}}
{{--                            <event-best-time :data="{{ $seasonBestMale1mile }}"></event-best-time>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <div class="flex w-1/5 text-lg text-primary font-semibold justify-center">--}}
{{--                        1 mile Run--}}
{{--                    </div>--}}
{{--                    <div class="w-2/5 text-center">--}}
{{--                        @if($seasonBestFemale1mile->count())--}}
{{--                            <event-best-time :data="{{ $seasonBestFemale1mile }}"></event-best-time>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}

            @if($results3200m)
                <div class="flex flex-wrap content-center md:h-32 py-6 md:py-0">
                    <div class="order-2 w-full md:order-1 md:w-2/5 text-center mb-2">
                        @if($seasonBestMale3200)
                            <event-best-time :data="{{ $seasonBestMale3200 }}"></event-best-time>
                        @endif
                    </div>
                    <div class="order-1 md:order-2 flex w-full md:w-1/5 text-lg font-semibold justify-center mb-2 md:mb-0">
                        <a href="/track/season-bests/athletes-season-bests/3200m"
                            class="text-blue-700">3200m Run</a>
                    </div>
                    <div class="order-3 w-full md:w-2/5 text-center">
                        @if($seasonBestFemale3200)
                            <event-best-time :data="{{ $seasonBestFemale3200 }}"></event-best-time>
                        @endif
                    </div>
                </div>
            @endif

{{--            @if($results2mile->count())--}}
{{--                <div class="flex flex-wrap">--}}
{{--                    <div class="w-2/5 text-center">--}}
{{--                        @if($seasonBestMale2mile->count())--}}
{{--                            <event-best-time :data="{{ $seasonBestMale2mile }}"></event-best-time>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <div class="flex w-1/5 text-lg text-primary font-semibold justify-center">--}}
{{--                        2 mile Run--}}
{{--                    </div>--}}
{{--                    <div class="w-2/5 text-center">--}}
{{--                        @if($seasonBestFemale2mile->count())--}}
{{--                            <event-best-time :data="{{ $seasonBestFemale2mile }}"></event-best-time>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
        </main>





    </div>


@endsection
