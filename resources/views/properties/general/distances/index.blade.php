@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <distances :data="{{ $distances }}"></distances>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection