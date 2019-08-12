@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <race-events :data="{{ $events }}"></race-events>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection
