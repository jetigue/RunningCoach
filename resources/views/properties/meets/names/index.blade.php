@extends('layouts.user')

@section('content')
    <meet-names :data="{{ $names }}"></meet-names>
@endsection