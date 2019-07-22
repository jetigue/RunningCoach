@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <users :data="{{ $users }}"></users>
    @endcomponent
@endsection

{{-- @section('aside')
    <filters>

    </filters>
@endsection --}}
