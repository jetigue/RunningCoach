@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <training-phases :data="{{ $phases }}"></training-phases>
    @endcomponent
@endsection
