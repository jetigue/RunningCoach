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
                    <athlete-cross-results :data="{{ $results }}"></athlete-cross-results>

{{--                            @foreach($crossResults as $crossResult)--}}

{{--                                <div class="flex py-2 border-b border-gray-300 hover:bg-gray-100 px-2">--}}
{{--                                    <div class="w-1/6">--}}
{{--                                        {{ \Carbon\Carbon::parse($crossResult->meet_date)->format('M d, Y') }}--}}
{{--                                    </div>--}}
{{--                                    <div class="w-1/3">--}}
{{--                                        <a href="/cross-country-meets/{{ $crossResult->meetSlug}}">--}}
{{--                                            {{ $crossResult->name }}--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="w-1/6">--}}
{{--                                        <a href="/cross-country-meets/{{ $crossResult->meetSlug}}/team-results/{{ $crossResult->cross_country_team_result_id }}">--}}
{{--                                            {{ $crossResult->name }}--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                </tab>
                <tab title="Training Paces">
                    <p>These are the training paces</p>
                </tab>
            </tabs>
        </section>
    </div>

@endsection
