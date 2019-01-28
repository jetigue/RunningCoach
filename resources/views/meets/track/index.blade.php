@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <track-meets :data="{{ $trackMeets }}"></track-meets>
    @endcomponent
@endsection

@section('aside')
    <filters>
        <track-season-filter></track-season-filter>
    </filters>
@endsection