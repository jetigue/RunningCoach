@extends('layouts.user')

@section('content')
    @component('components.userTables')
        <cross-country-meets :data="{{ $crossCountryMeets }}"></cross-country-meets>
    @endcomponent
@endsection

