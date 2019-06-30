@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <running-logs :data="{{ $runningLogs }}"></running-logs>
    @endcomponent
@endsection
