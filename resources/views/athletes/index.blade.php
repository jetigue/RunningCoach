@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <athletes :data="{{ $athletes }}"></athletes>
    @endcomponent
@endsection

@section('aside')
    <filters>
        <status-filter></status-filter>
    </filters>
@endsection