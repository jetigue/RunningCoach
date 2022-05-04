@extends('layouts.main')

@section('content')
<div class="flex flex-col w-full mx-auto min-h-screen p-4 lg:px-8">
    <p class="text-primary text-3xl font-thin text-left">Team Camp</p>

    <div class="flex flex-wrap">
        <div class="flex w-full lg:w-7/12">
            <div class="flex flex-col leading-normal">
                <p class="">
                    Come help us kick off another great season by joining us for our 6th annual team camp! The goal of the camp is to make us a better team -- by making everyone a better distance runner through training and education, while at the same time bringing us closer as a group.
                </p>
                <p class="py-2">The camp will take place on the beautiful Berry College campus, which boasts miles of soft running
                        trails on one of the safest and largest college campuses in the world.
                </p>
                <p class="py-2">
                    Like other running camps, each day will consist of some training runs, informational sessions, team
                    activities and some free time. Unlike other running camps, however, our camp will be designed with only our team in mind which means we can be as flexible as we want while preparing for the upcoming 2021 cross country season. It promises to be a lot of fun!
                </p>
            </div>
        </div>

        <div class="flex w-full md:py-2 lg:w-5/12">
            <div class="bg-white rounded shadow-md w-full">
                <header class="bg-smoke-800 text-white text-xl py-2 px-4 rounded-t text-center md:text-left">2021 Team Camp</header>
                <section >
                    <p class="text-sm md:text-base py-2 px-4">
                        <span class="text-black font-semibold">
                            Dates:
                        </span>
                            Monday, July 18 - Friday, July 22
                    </p>

                    <p class="text-sm md:text-base py-2 px-4">
                        <span class="text-black font-semibold">
                            Transportation:
                        </span>
                            Bus will depart from Lambert Stadium Lot at 9:00 am Monday morning and return Friday at Noon.
                    </p>

                    <p class="text-sm md:text-base py-2 px-4">
                        <span class="text-black font-semibold">
                            Cost:
                        </span>
                            $375 per runner. Please make checks out to LHSXC Booster Club and turn in to Coach Tigue by Thursday, July 14th.
                    </p>

                    <p class="text-sm md:text-base py-2 px-4">
                        <span class="text-black font-semibold">
                            Sign Up:
                        </span>
                             <a class="text-blue-600"
                                href="https://forms.gle/iq3zs7knPZVi4vzi9">
                                2022 Team Camp Registration
                             </a>
                    </p>
                </section>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap lg:items-center md:items-start py-4">
        <div class="flex w-full md:w-1/3">
            <div class="bg-white rounded shadow p-2 lg:p-4">
                <img src="{{url('images/camp/fordBuildings.jpg')}}" width="100%" alt="Berry Ford Buildings">
            </div>
        </div>
        <div class="flex flex-col w-full md:w-2/3 leading-normal pl-4">
            <p class="">
                The team camp will begin on the morning of Monday, July 18th and conclude on the morning of Friday, July
                22nd. This year we will be providing bus transportation to and from the camp. While on campus, the
                runners and coaches (and any parents who wish to join us) will be staying in one of the dorms on Berry's main campus.
                Each dorm room is equipped with two twin beds and dressers. Linens are not provided.
            </p>

            <p class="py-2">
                The cost of the camp will be $375 for each athlete which includes 4 nights lodging, 12 meals, limited
                accidental insurance, camp t-shirt, transportation in and around campus, and transportation to and from camp.
            </p>
        </div>
    </div>

        <div class="flex justify-between flex-wrap">
            <div class="flex flex-col w-full lg:w-5/12 p-2">
                <p><strong>What To Bring</strong></p>
                <p>Each camper should plan on bringing the following items:</p>
                <ul class="list-disc px-6">
                    <li>Sheets for twin bed, pillow and blanket</li>
                    <li>Bath Linens</li>
                    <li>Toiletries</li>
                    <li>Training Shoes (multiple pairs if you have them)</li>
                    <li>Several sets of training clothing*</li>
                    <li>Plenty of socks</li>
                    <li>Bathing suit & towel</li>
                    <li>Preferred snacks and drinks</li>
                </ul>
                <p>*The dorms are equipped with laundry rooms but please bring enough running clothes to last at least a couple of days.</p>
            </div>

            <div class="flex flex-col w-full lg:w-5/12 p-2">
                <p><strong>Tentative Daily Schedule</strong></p>
                <p>6:30 am: Morning Run</p>
                <p>8:00 am: Breakfast</p>
                <p>10:30 am: Team Activities</p>
                <p>12:00 pm: Lunch</p>
                <p>1:00 pm: Free Time</p>
                <p>3:00 pm: Swimming/Team Activity</p>
                <p>5:00 pm: Easy Run</p>
                <p>6:30 pm: Dinner</p>
                <p>8:00 pm: Team Activities</p>
            </div>
        </div>

    <div class="flex w-full bg-white p-2 mt-4">
        <img src="{{url('images/camp/volleyball.jpg')}}" alt="Berry Camp Volleyball">
    </div>

</div>
@endsection
