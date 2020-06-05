@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <training-intensities :data="{{ $intensities }}"></training-intensities>
    @endcomponent
@endsection
