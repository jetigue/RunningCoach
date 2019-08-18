@extends('layouts.main')

@section('content')
<div class="flex flex-row flex-wrap">

    <div class="w-full md:w-3/4 md:order-first">
        <div class="p-2">
            <main class="">
                <announcements :data="{{ $announcements }}"></announcements>
            </main>
        </div>
    </div>

    <div class="w-full md:w-1/4 lg:w-1/4 md:order-last">
        <div class="p-2 md:pl-0 lg:px-2">
            <aside class="">
                <events :data="{{ $teamEvents }}"></events>
            </aside>
        </div>
    </div>

</div>
@endsection
