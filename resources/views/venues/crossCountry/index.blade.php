@extends('layouts.user')

@section('content')
<div class="flex flex-col w-full">
    <div class="flex justify-between items-baseline">
        <header class="font-light text-2xl lg:text-4xl pb-1 text-primary">Cross Country Venues</header>
    </div>
    <div class="gradient-line"></div>

    <div class="table-container-no-border border-b-2 border-gray-400 my-4">
        <div class="table-body">

            @foreach($venues as $venue)
            <div class="flex flex-col border-b border-gray-200 hover:bg-gray-100">
                <div class="flex flex-wrap items-baseline">
                    <div class="w-full md:w-3/4 lg:w-1/2 text-lg py-1">
                        {{ $venue->name }}
                    </div>
                    <div class="pl-2 md:pl-0 w-1/2 lg:w-1/4 text-center">
                        <a class="text-blue-700" href="/cross-country-venues/{{$venue->id}}/boys-records">
                            Boys Records
                        </a>
                    </div>
                    <div class="pl-2 md:pl-0 w-1/2 lg:w-1/4 justify-right md:text-center">
                        <a class="text-blue-700"
                           href="/cross-country-venues/{{$venue->id}}/girls-records">
                            Girls Records
                        </a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>


</div>

@endsection
