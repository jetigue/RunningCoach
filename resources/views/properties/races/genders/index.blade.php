@extends('layouts.user')

@section('content')
    <genders :data="{{ $genders }}"></genders>
@endsection