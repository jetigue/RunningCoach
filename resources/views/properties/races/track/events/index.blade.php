@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <track-events :data="{{ $events }}"></track-events>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection
