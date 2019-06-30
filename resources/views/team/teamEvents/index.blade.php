@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <team-events :data="{{ $teamEvents }}"></team-events>
    @endcomponent
@endsection
