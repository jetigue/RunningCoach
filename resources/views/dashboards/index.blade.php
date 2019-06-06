@extends('layouts.user')

@section('content')
    <div class="flex flex-col w-full">
        @if(Auth::user()->role->slug === 'admin')
            <h1>Admin's Dashboard</h1>
            <div class="flex py-4 justify-around flex-wrap">
                <div class="p-4 w-full md:w-1/3 lg:w-1/5">
                    <div class="card purple-gradient text-white h-48 p-2">
                        <header class="text-2xl text-center">Meet Properties</header>
                        <div class="flex flex-wrap p-4">
                            <a class="py-1 w-1/2" href="/events">Events</a>
                            <a class="py-1 w-1/2" href="/genders">Genders</a>
                            <a class="py-1 w-1/2" href="/levels">Levels</a>
                            <a class="py-1 w-1/2" href="/seasons">Seasons</a>
                            <a class="py-1 w-1/2" href="/timing">Timing</a>
                        </div>
                    </div>
                </div>
                <div class="p-4 w-full md:w-1/3 lg:w-1/5">
                    <div class="card red-gradient text-white h-48 p-2">
                        <header class="text-2xl text-center">Users</header>
                        <div class="flex flex-col p-4">
                            <a class="py-1 w-1/2" href="/users">Users</a>
                            <a class="py-1 w-1/2" href="/user-roles">User Roles</a>
                        </div>
                    </div>
                </div>
            </div>

        @elseif(Auth::user()->role->slug === 'coach')
            <h1>Coach's Dashboard</h1>
            <div class="flex py-4 justify-around flex-wrap">
                <div class="p-4 w-full md:w-1/3 lg:w-1/5">
                    <div class="card red-gradient text-white h-48 p-2">
                        <header class=" text-2xl text-center">Athletes</header>
                        <div class="flex flex-col p-4">
                            <a class="py-1" href="/athletes">Manage Athletes</a>
                        </div>
                    </div>
                </div>
                <div class="p-4 w-full md:w-1/3 lg:w-1/5">
                    <div class="card green-gradient text-white h-48 p-2">
                        <header class="text-2xl text-center">Track & Field</header>
                        <div class="flex flex-col p-4">
                            <a class="py-1" href="/track-meets">Track Meets</a>
                        </div>
                    </div>
                </div>
                <div class="p-4 w-full md:w-1/3 lg:w-1/5">
                    <div class="card purple-gradient text-white h-48 p-2">
                        <header class="text-2xl text-center">Meet Properties</header>
                        <div class="flex flex-col p-4">
                            <a class="py-1" href="/hosts">Meet Hosts</a>
                            <a class="py-1" href="/meet-names">Meet Names</a>
                            <a class="py-1" href="/venues">Meet Venues</a>
                        </div>
                    </div>
                </div>
            </div>



        @else
            <h1>Athlete Dashboard</h1>
        @endif

    </div>





@endsection