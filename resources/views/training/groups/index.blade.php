@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <training-groups :data="{{ $groups }}"></training-groups>
    @endcomponent
@endsection
