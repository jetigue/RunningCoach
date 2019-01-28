@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <meet-names :data="{{ $meetNames }}"></meet-names>
    @endcomponent
@endsection

@section('aside')
    <filters>
        <season-filter></season-filter>
    </filters>
@endsection