@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <steady-run-types :data="{{ $steadyRuns }}"></steady-run-types>
    @endcomponent
@endsection

