@extends('layouts.user')

@section('content')
    <seasons :data="{{ $seasons }}"></seasons>
@endsection