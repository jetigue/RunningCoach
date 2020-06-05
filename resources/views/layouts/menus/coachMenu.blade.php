<div class="h-full min-h-full text-sm">
    <header class="font-thin mb-2 md:text-xl lg:text-2xl text-primary">Coach's Menu</header>

    <div class="flex flex-col pl-2">
        <a class="text-gray-700 hover:text-gray-900" href="/">Home</a>
    </div>

    <div class="py-1">
        <p class="text-primary text-lg">Administration</p>
        <div class="flex flex-col pl-2">
            <a class="text-gray-700 hover:text-gray-900" href="/announcements">Announcements</a>
            <a class="text-gray-700 hover:text-gray-900" href="/team-events">Events</a>
            <a class="text-gray-700 hover:text-gray-900" href="/physicals">Physicals</a>
        </div>
    </div>
    <div class="py-1">
        <p class="text-primary text-lg">Athletes</p>
        <div class="flex flex-col pl-2">
            <a class="text-gray-700 hover:text-gray-900" href="/active-athletes">Active Athletes</a>
            <a class="text-gray-700 hover:text-gray-900" href="/athletes">All Athletes</a>
        </div>
    </div>
    <div class="py-1">
        <p class="text-primary text-lg">Results</p>
        <div class="flex flex-col pl-2">
            <a class="text-gray-700 hover:text-gray-900" href="/cross-country/meets">Cross Country</a>
            <a class="text-gray-700 hover:text-gray-900" href="/track/meets">Track</a>
        </div>
    </div>
    <div class="py-1">
        <p class="text-primary text-lg">Running Log</p>
        <div class="flex flex-col pl-2">
            <a class="text-gray-700 hover:text-gray-900" href="/running-log">Log a Run</a>
            <a class="text-gray-700 hover:text-gray-900" href="/team-log">Team Log</a>
            <a class="text-gray-700 hover:text-gray-900" href="/summer-running">Summer Running</a>
        </div>
    </div>
    <div class="py-1">
        <p class="text-primary text-lg">Meet Properties</p>
        <div class="flex flex-col pl-2">
            <a class="text-gray-700 hover:text-gray-900" href="/hosts">Meet Hosts</a>
            <a class="text-gray-700 hover:text-gray-900" href="/cross-country/meet-names">XC Meet Names</a>
            <a class="text-gray-700 hover:text-gray-900" href="/cross-country/venues">XC Venues</a>
            <a class="text-gray-700 hover:text-gray-900" href="/track/meet-names">Track Meet Names</a>
            <a class="text-gray-700 hover:text-gray-900" href="/track/venues">Track Venues</a>
        </div>
    </div>
    <div class="py-1">
        <p class="text-primary text-xl md:text-base lg:text-xl">Workouts</p>
        <div class="flex flex-col pl-2">
            <a class="text-gray-700 hover:text-gray-900" href="/training-calendar">Calendar</a>
            <a class="text-gray-700 hover:text-gray-900"
               href="/training-calendar/{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                Today's Workout
            </a>
        </div>
    </div>
    <div class="py-1">
        <p class="text-primary text-xl md:text-base lg:text-xl">Time Trials</p>
        <div class="flex flex-col pl-2">
            <a class="text-gray-700 hover:text-gray-900" href="/track/time-trials">Track</a>
        </div>
    </div>
</div>
