@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <genders :data="{{ $genders }}"></genders>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection