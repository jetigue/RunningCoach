@extends('layouts.user')

@section('content')
    <div class="flex flex-col w-full">
        <header class="flex text-primary text-4xl font-thin">Training Groups</header>
        <div class="gradient-line"></div>
        <athlete-training-groups
            :crimson-group="{{ $crimson }}"
            :crimson-group-male-athletes="{{ $crimsonGroupMales }}"
            :crimson-group-female-athletes="{{ $crimsonGroupFemales }}"
            :black-group="{{ $black }}"
            :black-group-male-athletes="{{ $blackGroupMales }}"
            :black-group-female-athletes="{{ $blackGroupFemales }}"
            :white-group="{{ $white }}"
            :white-group-male-athletes="{{ $whiteGroupMales }}"
            :white-group-female-athletes="{{ $whiteGroupFemales }}"
            :green-group="{{ $green }}"
            :green-group-male-athletes="{{ $greenGroupMales }}"
            :green-group-female-athletes="{{ $greenGroupFemales }}"
            :none-group="{{ $none }}"
            :none-group-male-athletes="{{ $noneGroupMales }}"
            :none-group-female-athletes="{{ $noneGroupFemales }}"
        >
        </athlete-training-groups>
    </div>
@endsection

