@extends('layouts.main')

@section('content')
<div class="flex flex-row flex-wrap">

    <div class="w-full lg:w-3/4 md:order-first">
        <div class="p-2">
            <main class="">
                <announcements :data="{{ $announcements }}"></announcements>
            </main>
        </div>
    </div>

{{--    <div class="flex flex-wrap content-start w-full lg:w-1/4 md:order-3">--}}
{{--        <div class="flex flex-wrap items-center w-full">--}}
{{--            <div class="w-full p-2 md:px-2 ">--}}
{{--                <div class="flex flex-col bg-white rounded p-4 w-full">--}}
{{--                    <header>--}}
{{--                        <p class="lg:text-3xl md:text-2xl text-lg font-thin">--}}
{{--                            Latest Results--}}
{{--                        </p>--}}
{{--                        <div class="primary-line mb-1"></div>--}}
{{--                    </header>--}}
{{--                    <section class="text-gray-800">--}}

{{--                    </section>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="w-full md:w-1/2 lg:w-full p-2 md:px-2">--}}
{{--                <div class=" md:h-full lg:h-48 p-2">--}}
{{--                    <img src="" alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="w-full md:w-1/3 lg:w-1/4 md:order-last">
        <div class="p-2 md:pl-0 lg:px-2">
            <aside class="">
                <events :data="{{ $teamEvents }}"></events>
            </aside>
        </div>
    </div>

</div>






@endsection
