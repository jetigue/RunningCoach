@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <race-titles :data="{{ $titles }}"></race-titles>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection
