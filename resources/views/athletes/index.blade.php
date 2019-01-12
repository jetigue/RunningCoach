@extends('layouts.user')

@section('content')
    <athletes :data="{{ $athletes }}"></athletes>
@endsection