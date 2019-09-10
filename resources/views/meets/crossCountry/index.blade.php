@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <div class="flex justify-between items-baseline">
            <header class="font-light text-2xl lg:text-4xl pb-1 text-primary">Cross Country Meets</header>
        </div>
        <cross-country-meets :data="{{ $crossCountryMeets2019 }}" class="py-4">2019</cross-country-meets>
        <cross-country-meets :data="{{ $crossCountryMeets2018 }}" class="py-4">2018</cross-country-meets>
        <cross-country-meets :data="{{ $crossCountryMeets2017 }}" class="py-4">2017</cross-country-meets>
        <cross-country-meets :data="{{ $crossCountryMeets2016 }}" class="py-4">2016</cross-country-meets>
        <cross-country-meets :data="{{ $crossCountryMeets2015 }}" class="py-4">2014</cross-country-meets>
        <cross-country-meets :data="{{ $crossCountryMeets2014 }}" class="py-4">2014</cross-country-meets>
        <cross-country-meets :data="{{ $crossCountryMeets2013 }}" class="py-4">2013</cross-country-meets>
        <cross-country-meets :data="{{ $crossCountryMeets2012 }}" class="py-4">2012</cross-country-meets>
        <cross-country-meets :data="{{ $crossCountryMeets2011 }}" class="py-4">2011</cross-country-meets>
        <cross-country-meets :data="{{ $crossCountryMeets2010 }}" class="py-4">2010</cross-country-meets>
        <cross-country-meets :data="{{ $crossCountryMeets2009 }}" class="py-4">2009</cross-country-meets>
    @endcomponent
@endsection

