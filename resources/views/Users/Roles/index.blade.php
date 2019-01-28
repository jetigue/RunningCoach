@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <user-roles :data="{{ $roles }}"></user-roles>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection