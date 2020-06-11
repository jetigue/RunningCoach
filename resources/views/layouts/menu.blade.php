<div class="hidden md:flex md:flex-col h-full">
{{--        <div class="flex flex-col py-4 justify-center">--}}
{{--            <form method="GET" action="/athletes/search" class="pr-4">--}}
{{--                <div class="flex justify-between content-end">--}}
{{--                    <label class="form-label" for="search">Search</label>--}}
{{--                </div>--}}
{{--                <input type="text" class="form-input" name="q" id="form.search">--}}
{{--                    <div class="text-right pt-2">--}}
{{--                    <button type="submit"--}}
{{--                            class="submit-button">--}}
{{--                            Search--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
    @if(Auth::user() && Auth::user()->role->slug === 'admin')

        @include('layouts.menus.adminMenu')
        @include('layouts.menus.coachMenu')

    @elseif(Auth::user() && Auth::user()->role->slug === 'coach')

        @include('layouts.menus.coachMenu')

    @elseif(Auth::user() && Auth::user()->role->slug === 'athlete')

        @include('layouts.menus.athleteMenu')

    @elseif(Auth::user() && Auth::user()->role->slug === 'viewer')

        @include('layouts.menus.userMenu')

    @endif

</div>
