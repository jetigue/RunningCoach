@extends('layouts.user')

@section('content')

        <div class="flex flex-col">
            @foreach($athletes as $athlete)
                <div>
                    {{ $athlete->last_name }}, {{ $athlete->first_name }}
                </div>

            @endforeach
        </div>


@endsection
