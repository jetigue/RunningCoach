@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <run-feelings :data="{{ $runFeelings }}"></run-feelings>
    @endcomponent
@endsection