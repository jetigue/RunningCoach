@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <seasons :data="{{ $seasons }}"></seasons>
    @endcomponent
@endsection

@section('aside')
<filter></filter>
@endsection