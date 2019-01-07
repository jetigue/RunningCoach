@extends('layouts.user')

@section('content')
    <meet-venues :data="{{ $venues }}"></meet-venues>
@endsection