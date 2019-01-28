@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <divisions :data="{{ $divisions }}"></divisions>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection