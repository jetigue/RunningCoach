@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <cross-country-events :data="{{ $events }}"></cross-country-events>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection
