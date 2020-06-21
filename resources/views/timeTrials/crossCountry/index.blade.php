@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <cross-country-time-trials :data="{{ $timeTrials }}"></cross-country-time-trials>
    @endcomponent
@endsection

@section('aside')

@endsection
