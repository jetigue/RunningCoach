@extends('layouts.main')

@section('content')
<div class="flex flex-row flex-wrap">

    <div class="w-full md:w-full lg:w-2/5 md:order-first">
        <div class="p-2">
            <main class="">
                <announcements :data="{{ $announcements }}"></announcements>
            </main>
        </div>
    </div>

    <div class="flex flex-wrap content-start w-full lg:w-2/5 md:order-3">
        <div class="flex flex-wrap items-center">
            <div class="w-full md:w-1/2 lg:w-full p-2 md:px-2 ">
                <div class="flex flex-col bg-white rounded p-4">
                    <header>
                        <p class="lg:text-3xl md:text-2xl text-lg font-thin">
                            Spirit Wear!
                        </p>
                        <div class="primary-line mb-1"></div>
                    </header>
                    <section>
                        <p>
                            The last day to order spirit wear items is Friday, August 9th at the pasta dinner! Links for the spirit flyer and order form are found below.
                        </p>
                        <p class="py-2">We need a minimum of 6 orders per gender to place an order for the Boathouse Jackets.</p>
                        <div class="flex flex-wrap justify-between">
                            <p><a class="text-center text-blue-600"
                                  href="/forms/spiritwear/SpiritWearFlyer2019.pdf">
                                    Spirit Wear Flyer
                                </a>
                            </p>
                            <p><a class="text-center text-blue-600"
                                  href="/forms/spiritwear/OrderForm2019.pdf">
                                    Order form
                                </a>
                            </p>
                        </div>
                    </section>
                </div>
            </div>

            <div class="w-full md:w-1/2 lg:w-full p-2 md:px-2">
                <div class=" md:h-full lg:h-48 p-2">
                    <img src="/images/spirit_wear/BoathouseJacket.jpg" alt="Boathouse Jacket">
                </div>
            </div>


        </div>

        <div class="w-full p-2 md:px-2">
            <div class="flex-col bg-white rounded p-4">
                <header>
                    <p class="lg:text-3xl md:text-2xl text-lg font-thin">
                        Longhorn 5k
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
                           href="/forms/longhorn5k/Longhorn5kRegistration2019.pdf">
                            Registration Form
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="w-full md:w-1/3 lg:w-1/5 md:order-last">
        <div class="p-2 md:pl-0 lg:px-2">
            <aside class="">
                <events :data="{{ $teamEvents }}"></events>
            </aside>
        </div>
    </div>

</div>






@endsection
