<div class="hidden md:flex md:flex-col">
    @if(Auth::user() && Auth::user()->role->slug === 'admin')

        @include('layouts.menus.adminMenu')
        @include('layouts.menus.coachMenu')


    @elseif(Auth::user() && Auth::user()->role->slug === 'coach')

        @include('layouts.menus.coachMenu')
    {{--<general-properties class="md:py-2 lg:p-2"></general-properties>--}}
    {{--<meet-properties class="md:py-2 lg:p-2"></meet-properties>--}}
    {{--<race-properties class="md:py-2 lg:p-2"></race-properties>--}}

    @endif

</div> 