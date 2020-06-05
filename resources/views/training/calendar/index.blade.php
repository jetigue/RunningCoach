@extends('layouts.user')

@section('content')
    <training-calendar :data="{{ $calendar }}"></training-calendar>
@endsection
