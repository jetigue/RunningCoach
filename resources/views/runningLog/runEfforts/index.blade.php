@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <run-efforts :data="{{ $runEfforts }}"></run-efforts>
    @endcomponent
@endsection