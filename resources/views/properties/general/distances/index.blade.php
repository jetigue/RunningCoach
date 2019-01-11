@extends('layouts.user')

@section('content')
    <distances :data="{{ $distances }}"></distances>
@endsection