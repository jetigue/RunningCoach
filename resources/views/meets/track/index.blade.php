@extends('layouts.user')

@section('content')
    <div class="flex flex-col w-full">
        <track-meets-container :data="{{ $trackMeets }}">
            <track-meets :data="{{ $trackMeets2020 }}" class="py-4">2020</track-meets>
            <track-meets :data="{{ $trackMeets2019 }}" class="py-4">2019</track-meets>
            <track-meets :data="{{ $trackMeets2018 }}" class="py-4">2018</track-meets>
            <track-meets :data="{{ $trackMeets2017 }}" class="py-4">2017</track-meets>
            <track-meets :data="{{ $trackMeets2016 }}" class="py-4">2016</track-meets>
            <track-meets :data="{{ $trackMeets2015 }}" class="py-4">2015</track-meets>
            <track-meets :data="{{ $trackMeets2014 }}" class="py-4">2014</track-meets>
            <track-meets :data="{{ $trackMeets2013 }}" class="py-4">2013</track-meets>
            <track-meets :data="{{ $trackMeets2012 }}" class="py-4">2012</track-meets>
            <track-meets :data="{{ $trackMeets2011 }}" class="py-4">2011</track-meets>
            <track-meets :data="{{ $trackMeets2010 }}" class="py-4">2010</track-meets>
        </track-meets-container>
    </div>


@endsection

