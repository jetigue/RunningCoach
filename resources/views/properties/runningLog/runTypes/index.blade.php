@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <run-types :data="{{ $runTypes }}"></run-types>
    @endcomponent
@endsection