@extends('layouts.user')

@section('content')
    <events :data="{{ $events }}"></events>
@endsection