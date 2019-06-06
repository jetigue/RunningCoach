@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <day-times :data="{{ $dayTimes }}"></day-times>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection