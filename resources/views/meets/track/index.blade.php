@extends('layouts.user')

@section('content')
    <track-meets :data="{{ $trackMeets }}"></track-meets>
@endsection