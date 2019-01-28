@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <meet-hosts :data="{{ $hosts }}"></meet-hosts>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection