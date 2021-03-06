@extends('layouts.main')

@section('content')
    <div class="flex flex-col w-full">
        <header class="text-3xl lg:text-5xl text-primary font-thin text-center p-2">Season's Bests</header>
        <div class="flex flex-wrap justify-around w-full">
            <div class="flex w-full flex-wrap justify-around font-semibold lg:flex-col lg:w-1/6  lg:mt-16
                        lg:justify-start lg:border-2 border-primary rounded-lg lg:text-center lg:p-2 lg:h-48">
                <p class="px-2 py-1 text-blue-700"><a href="/track/season-bests/athletes-season-bests/800m">800m Run</a></p>
                <p class="px-2 py-1 text-blue-700"><a href="/track/season-bests/athletes-season-bests/1600m">1600m Run</a></p>
                <p class="px-2 py-1 text-blue-700"><a href="/track/season-bests/athletes-season-bests/3200m">3200m Run</a></p>
                <p class="px-2 py-1 text-blue-700"><a href="/track/season-bests/athletes-season-bests/1200m">1200m Run</a></p>
                <p class="px-2 py-1 text-blue-700"><a href="/track/season-bests/athletes-season-bests/1500m">1500m Run</a></p>
            </div>
            <div class="flex w-full md:w-5/12 lg:w-2/5 p-2 lg:px-4 md:px-0">
                <athlete-season-bests :data = "{{ $maleAthleteSeasonBest }}"></athlete-season-bests>
            </div>
            <div class="flex w-full md:w-5/12 lg:w-2/5 p-2 lg:px-4 md:px-0">
                <athlete-season-bests :data = "{{ $femaleAthleteSeasonBest }}"></athlete-season-bests>
            </div>
        </div>
    </div>


@endsection
