@extends('layouts.user')

@section('content')
    <div class="">
        <meet-hosts :data="{{ $hosts }}"></meet-hosts>
    </div>

@endsection
