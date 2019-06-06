@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <terrain-types :data="{{ $terrainTypes }}"></terrain-types>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection