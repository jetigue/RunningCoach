@extends('layouts.user')

@section('content')
    <meet-hosts :data="{{ $hosts }}"></meet-hosts>
@endsection
