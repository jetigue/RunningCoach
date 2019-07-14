@extends('layouts.main')

@section('content')

<div class="flex flex-col w-full mx-auto min-h-screen p-4 lg:px-8">

    <p class="text-primary text-3xl font-thin text-left">Lambert River Run</p>
    <div class="primary-line my-1"></div>

    <div class="flex flex-wrap py-2 justify-between items-start">
        <div class="flex w-full lg:w-7/12 py-2">
            <div class="flex flex-col leading-normal">
                <p class="">
                    Unfortunately, the Lambert River Run will not be taking place this year as park access has been limited by Forsyth County Parks and Rec. Thank you to all the teams that attended the meet in the past for supporting our program and making the Lambert River run a very competetive meet.
                </p>

                <p class="py-2">
                    Forsyth County residents and coaches: feel free to voice your concerns to Forsyth Country Parks and Rec over the limited access to our county parks, which are vitally important for our cross country programs as they provide safe and convenient places for our kids to train and race.
                </p>
            </div>
        </div>

    <div class="flex flex-col w-full lg:w-5/12 py-2 text-center">
        <p class="text-primary text-xl">Past Results</p>
        <a class="text-blue-600 hover:underline"
           href="https://ga.milesplit.com/meets/311292/results#">
           2018 Results
        </a>
        <a class="text-blue-600 hover:underline"
           href="https://ga.milesplit.com/meets/279676/results#.XSs7b_ZFw_x">
           2017 Results
        </a>
        <a class="text-blue-600 hover:underline"
           href="https://ga.milesplit.com/meets/207935/results#.XSs7fPZFw_w">
           2015 Results
        </a>
    </div>


    </div>



@endsection
