@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <track-meet-names :data="{{ $meetNames }}"></track-meet-names>
    @endcomponent
@endsection

@section('aside')
    <filters>
        <season-filter></season-filter>
    </filters>
@endsection
