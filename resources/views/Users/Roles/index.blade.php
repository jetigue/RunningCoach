@extends('layouts.user')

@section('content')
    <user-roles :data="{{ $roles }}"></user-roles>
@endsection