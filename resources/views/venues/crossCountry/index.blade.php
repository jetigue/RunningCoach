@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl lg:text-4xl pb-1 text-primary">Cross Country Venues</header>
        </div>

    @endcomponent
@endsection
