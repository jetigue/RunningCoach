@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <cross-country-meet-names :data="{{ $meetNames }}"></cross-country-meet-names>
    @endcomponent
@endsection

@section('aside')
    <filters>
        <season-filter></season-filter>
    </filters>
@endsection
