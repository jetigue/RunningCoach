@if(Auth::guest())

    <button class="text-white text-sm"><a href="/login">Sign In</a></button>

@else
    <dropdown align="right" width="150px">

        <template v-slot:trigger>
            <button class="text-white text-sm">
                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
            </button>
        </template>

        <template v-slot:default>
            {{-- <a class="block hover:bg-smoke-200 px-4" href="/dashboard">My Dashboard</a> --}}
            <hr>
            <a class="block hover:bg-smoke-200 px-4" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </template>

    </dropdown>
@endif
