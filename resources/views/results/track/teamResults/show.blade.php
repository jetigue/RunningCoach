@extends('layouts.user')

@section('content')
<div class="flex flex-col w-full md:px-4 lg:px-8">
    <div class="flex -mt-8 md:m-0 text-tertiary text-xl md:justify-end">
        <a href="{{$teamResult->trackMeet->path()}}"><i class="fas fa-arrow-circle-left"></i> Back</a>
    </div>
    <div class="flex flex-col mt-4 md:m-0">
        <header class="text-primary text-xl md:text-2xl lg:text-4xl">{{ $teamResult->trackMeet->name->name}}</header>
        <p class="text-secondary text-sm md:text-lg lg:text-2xl pl-4 py-1">
            {{date('F j, Y', strtotime($teamResult->trackMeet->meet_date))}}
        </p>
    </div>
    <div class="flex bg-tertiary text-white text-lg md:text-xl lg:text 2xl p-1 justify-center">
        {{ $teamResult->gender->name }} {{ $teamResult->division->name }}
    </div>
    <div class="py-3">
        <track-results :data="{{ $teamResult->results->load('teamResult', 'athlete', 'event') }}"></track-results>
    </div>
</div>


@endsection