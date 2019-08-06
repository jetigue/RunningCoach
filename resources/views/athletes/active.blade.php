@extends('layouts.user')

@section('content')
    <div class="flex flex-wrap w-full">
        @component('components.userTables')
            <athletes :data="{{ $athletes }}"></athletes>
        @endcomponent
    </div>
@endsection

