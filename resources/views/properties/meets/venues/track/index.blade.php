@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <track-venues :data="{{ $venues }}"></track-venues>
    @endcomponent
@endsection

@section('aside')
    <filters>
        <season-filter></season-filter>
    </filters>
@endsection
