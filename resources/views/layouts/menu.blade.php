<div class="hidden md:flex md:flex-col h-full">
    @if(Auth::user() && Auth::user()->role->slug === 'admin')

        @include('layouts.menus.adminMenu')
        @include('layouts.menus.coachMenu')


    @elseif(Auth::user() && Auth::user()->role->slug === 'coach')

        @include('layouts.menus.coachMenu')

    @elseif(Auth::user() && Auth::user()->role->slug === 'athlete')

        @include('layouts.menus.athleteMenu')

    @endif

</div>
