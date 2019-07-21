@extends('layouts.main')

@section('content')
<div class="flex flex-row flex-wrap">

    <div class="w-full md:w-2/3 lg:w-2/5 md:order-1">
        <div class="p-2">
            <main class="">
                <announcements :data="{{ $announcements }}"></announcements>
            </main>
        </div>
    </div>

    <div class="flex flex-wrap content-start w-full lg:w-2/5 md:order-3">

        <div class=" w-full md:w-1/2 lg:w-full p-2 md:px-2 ">
            <div
                class="flex flex-col bg-white rounded p-4 bg-blue-100">
                <header>
                    <p class="lg:text-3xl md:text-2xl text-lg font-thin">
                        Join The Team!
                    </p>
                    <div class="primary-line mb-1"></div>
                </header>
                <section>
                    <p>
                        We would love for you to join one of the best cross country programs in the southeast!
                    </p>
                    <p class="py-2">To sign up, please complete the form linked below.</p>
                    <a class="text-center text-blue-600"
                       ref="https://drive.google.com/open?id=1XHsEDKWmUlzOehJ2Lvx0g6HimmbbD92BnRK4ibCFEB8">
                        2019 Sign-Up Form
                    </a>
                </section>
            </div>
        </div>

        <div class="hidden md:block md:w-1/2 lg:w-full p-2 md:px-2">
            <div class="bg-white rounded md:h-full lg:h-64 justify-center p-2">
                <div class="boys-state-2018 h-full"></div>
            </div>
        </div>

        <div class="w-full p-2 md:px-2">
            <div class="flex-col bg-white rounded p-4">
                <header>
                    <p class="lg:text-3xl md:text-2xl text-lg font-thin">
                        Longorn 5k
                    </p>
                    <div class="primary-line mb-1"></div>
                </header>
                <section>
                    <p>
                        Join us for the 11th Annual Longhorn 5K with proceeds benefiting the Longhorn Cross Country team! This year's race will be held along the banks of the Chattahoochee River at Chattahoochee Pointe Park.
                    </p>
                    <p class="py-2">
                        Packet Pickup will be held on Friday August 9th from 11:00 am - 3:00 pm at North Georgia Running Co. in Cumming, GA, and at race day registration which will begin at 7:00am.
                    </p>
                    <p class="py-2">
                        Awards to be given include Overall Male/Female and Masters Male/Female, and Age group awards. T-shirts are guaranteed to all runners registering by August 2nd.
                    </p>
                    <div class="flex flex-wrap justify-around">
                        <a class="text-blue-600"
                           href="https://runsignup.com/Race/GA/Suwanee/Longhorn5K">
                            Online Registration
                        </a>
                        <a class="text-blue-600 hover:underline"
                           href="/forms/longhorn5k/LonghornRegistration2019.pdf">
                            Registration Form
                        </a>
                    </div>

                </section>
            </div>
        </div>
    </div>

    <div class="w-full h-full md:w-1/3 lg:w-1/5 md:order-2 lg:order-last">
        <div class="p-2 md:pl-0 lg:px-2">
            <aside class="">
                <events :data="{{ $teamEvents }}"></events>
            </aside>
        </div>
    </div>

</div>






@endsection
