@extends('layouts.main')

@section('content')

<div class="flex flex-col w-full min-h-screen p-4 mx-auto lg:px-8">

    <p class="text-3xl font-thin text-left text-primary">Longhorn 5k</p>
    <div class="my-1 primary-line"></div>

    <div class="flex flex-wrap items-center justify-between py-2">
        <div class="flex w-full lg:w-7/12">
            <div class="flex flex-col leading-normal">
                <a href="https://runsignup.com/Race/GA/Cumming/Longhorn5K" type="button" class="px-2 py-2 mb-4 text-lg font-semibold text-center text-white rounded-md bg-crimson-600">Click to Register!</a>
                <p class="py-1">
                   Join us to Run with the Horns on Sunday, November 14, 2021.  This is the 13th annual 5K with proceeds benefiting the Longhorn Cross Country team!  This year we have changed our name, changed our venue, and upped our game as we will be running a certified USATF Course so that you can use our race as your Official AJC Peachtree Road Race Qualifying Event.
                </p>
                <p class="py-1">
                    Race T-shirts are guaranteed to all runners and ghost runners registering by October 28th, so register early!  Registration is $30 per registrant by October 28th, $35 per registrant from October 29th to November 11th, and $40 after that.
                </p>
                <p class="py-1">
                    We will be collecting gently used sneakers on the day of the race for those less fortunate in on-site collection boxes. Recycling and reusing sneakers keeps sneakers out of landfills, reduces the need for manufacturing new shoes and sneakers, and supports a growing circular economy.
                </p>
                <p class="py-1">
                    For more information, please e-mail Stacey Mumford at french_mumford@hotmail.com. Thanks in advance for supporting Lambert Cross Country!
                </p>
                <a class="py-1 font-semibold"
                    href="https://drive.google.com/file/d/1j5lA2xQITyNVkvOBSaXf_jgpMglBr3QT/view?usp=sharing">
                    Course Map
                </a>

            </div>
        </div>

        <div class="flex justify-center w-full md:py-2 lg:w-1/3">
            <div class="flex flex-col p-2 bg-white rounded shadow lg:p-4">
                <figure>
                    <img src="{{url('images/longhorn_5k/flyer2021.PNG')}}" width="100%" alt="Longhorn 5k">
                </figure>
            </div>
        </div>
    </div>

    <div class="flex flex-col w-full py-2 lg:w-1/2">
        <p class="text-xl text-left text-primary">Past Results</p>
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
