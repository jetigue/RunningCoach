@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <interval-runs :data="{{ $intervalRuns }}"></interval-runs>
    @endcomponent
@endsection

