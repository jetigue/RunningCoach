@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <levels :data="{{ $levels }}"></levels>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection