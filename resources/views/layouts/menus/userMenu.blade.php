<div class="h-full min-h-full text-sm">
    <header class="font-thin md:text-xl lg:text-2xl text-primary">Menu</header>

    <div class="flex flex-col pl-2">
        <a class="text-gray-700 hover:text-gray-900" href="/">Home</a>
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
        </div>
        <div class="flex flex-col pl-2">
            <a class="text-gray-700 hover:text-gray-900" href="/team-log">Team Log</a>
        </div>
        <div class="flex flex-col pl-2">
            <a class="text-gray-700 hover:text-gray-900" href="/summer-running">Summer Running</a>
        </div>
    </div>

    <div class="py-1">
        <p class="text-primary text-lg">Workouts</p>
        <div class="flex flex-col pl-2">
            <a class="text-gray-700 hover:text-gray-900" href="/training-calendar">Calendar</a>
            <a class="text-gray-700 hover:text-gray-900"
               href="/training-calendar/{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                Today's Workout
            </a>
        </div>
    </div>
</div>
