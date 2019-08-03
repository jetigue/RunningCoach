@extends('layouts.user')

@section('content')

<div class="flex flex-col w-full">
    <div class="flex justify-between items-center">
        <div class="text-3xl text-primary font-thin mb-2">
            Team Log
        </div>
        <div class="">
        </div>
    </div>

    <div class="flex flex-col lg:flex-row w-full">
        <div class="w-full">
            @component('components.userTables')
                <team-logs :data="{{ $teamLogs }}"></team-logs>
            @endcomponent
        </div>
    </div>
</div>

@endsection


