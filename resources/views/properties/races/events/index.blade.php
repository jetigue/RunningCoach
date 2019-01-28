@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <events :data="{{ $events }}"></events>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection