@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <cross-country-venues :data="{{ $venues }}"></cross-country-venues>
    @endcomponent
@endsection

@section('aside')
    <filters>
        <season-filter></season-filter>
    </filters>
@endsection
