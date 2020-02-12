@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <track-surfaces :data="{{ $surfaces }}"></track-surfaces>
    @endcomponent
@endsection

@section('aside')
    <filters>

    </filters>
@endsection
