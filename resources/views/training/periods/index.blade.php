@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <training-periods :data="{{ $periods }}"></training-periods>
    @endcomponent
@endsection
