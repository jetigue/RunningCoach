@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <meet-venues :data="{{ $venues }}"></meet-venues>
    @endcomponent
@endsection

@section('aside')
    <filters>
        <season-filter></season-filter>
    </filters>
@endsection