@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <team-announcements :data="{{ $announcements }}"></team-announcements>
    @endcomponent
@endsection
