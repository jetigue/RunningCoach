@extends('layouts.main')

@section('content')

<div class="flex flex-col w-full mx-auto min-h-screen p-4 lg:px-8">

    <p class="text-primary text-3xl font-thin text-left">Longhorn 5k</p>
    <div class="primary-line my-1"></div>

    <div class="flex flex-wrap py-2 justify-between items-center">
        <div class="flex w-full lg:w-7/12">
            <div class="flex flex-col leading-normal">
                <p>
                    <span class="text-xl font-semibold">Thank You</span> to everyone who came out and supported our program by participating in the Longhorn 5k!
                </p>
                <div class="flex flex-wrap justify-around">
                    <a class="text-blue-600"
                       href="https://runsignup.com/Race/Results/47756/#resultSetId-165993;perpage:5000">
                        Longhorn 5k Results
                    </a>
                </div>
            </div>
        </div>

        <div class="flex w-full md:py-2 lg:w-1/3 justify-center">
            <div class="flex flex-col bg-white rounded shadow p-2 lg:p-4">
                <figure>
                    <img src="{{url('images/longhorn_5k/Longhorn5k2016.png')}}" width="100%" alt="Longhorn 5k">
                </figure>
                <p class="text-center">2016 Longhorn 5k</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col w-full lg:w-1/2 py-2">
        <p class="text-primary text-xl text-left">Past Results</p>
        <a class="text-blue-600 hover:underline"
           href="https://runsignup.com/Race/Results/47756/#resultSetId-165993;perpage:5000">
            2019 Longhorn 5k Results
        </a>
        <a class="text-blue-600 hover:underline"
           href="https://runsignup.com/Race/Results/47756/#resultSetId-126278">
           2018 Longhorn 5k Results
        </a>
        <a class="text-blue-600 hover:underline"
           href="http://www.coolrunning.com/results/17/ga/Aug12_9thAnn_set1.shtml">
           2017 Longhorn 5k Results
        </a>
    </div>
</div>

@endsection
