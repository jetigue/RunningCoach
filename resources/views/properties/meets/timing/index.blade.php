@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <timing-methods :data="{{ $timing }}"></timing-methods>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection