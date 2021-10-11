@extends('layouts.main')

@section('content')

<div class="flex flex-col w-full mx-auto min-h-screen p-4 lg:px-8">

    <p class="text-primary text-3xl font-thin text-left">Longhorn 5k</p>
    <div class="primary-line my-1"></div>

    <div class="flex flex-wrap py-2 justify-between items-center">
        <div class="flex w-full lg:w-7/12">
            <div class="flex flex-col leading-normal space-y-1">
                <p>
                   Join us to Run with the Horns on Sunday, November 14, 2021.  This is the 13th annual 5K with proceeds benefiting the Longhorn Cross Country team!  This year we have changed our name, changed our venue, and upped our game as we will be running a certified USATF Course so that you can use our race as your Official AJC Peachtree Road Race Qualifying Event.
                </p>
                <p>
                    Race T-shirts are guaranteed to all runners and ghost runners registering by October 28th, so register early!  Registration is $30 per registrant by October 28th, $35 per registrant from October 29th to November 11th, and $40 after that.
                </p>
                <p>
                    We will be collecting gently used sneakers on the day of the race for those less fortunate in on-site collection boxes. Recycling and reusing sneakers keeps sneakers out of landfills, reduces the need for manufacturing new shoes and sneakers, and supports a growing circular economy.
                </p>
                <p>
                    For more information, please e-mail Stacey Mumford at french_mumford@hotmail.com. Thanks in advance for supporting Lambert Cross Country!
                </p>

            </div>
        </div>

        <div class="flex w-full md:py-2 lg:w-1/3 justify-center">
            <div class="flex flex-col bg-white rounded shadow p-2 lg:p-4">
                <figure>
                    <img src="{{url('images/longhorn_5k/flyer2021.PNG')}}" width="100%" alt="Longhorn 5k">
                </figure>
            </div>
        </div>
    </div>
    <div class="flex flex-col w-full lg:w-1/2 py-2">
        <p class="text-primary text-xl text-left">Past Results</p>
        <a class="text-blue-600 hover:underline"
           href="https://www.trisignup.com/Race/Results/47756/?resultSetId=213837&textVersion">
            2020 Longhorn 5k Results
        </a>
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
