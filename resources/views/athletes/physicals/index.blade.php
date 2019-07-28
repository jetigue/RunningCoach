@extends('layouts.user')

@section('content')
    <div class="flex flex-wrap w-full">
        @component('components.userTables')
            <physicals :data="{{ $physicals }}"></physicals>
        @endcomponent
    </div>
@endsection
