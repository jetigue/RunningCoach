@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <track-time-trials :data="{{ $timeTrials }}"></track-time-trials>
    @endcomponent
@endsection

@section('aside')

@endsection
