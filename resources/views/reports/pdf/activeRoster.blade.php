<x-pdf-layout>

    <ul>
        @foreach($athletes as $athlete)
            <div class="flex w-full justify-between">
                <div class="w-1/2">{{ $athlete->last_name }}, {{ $athlete->first_name }}</div>
                <div class="w-1/10 border border-black"></div>
                <div class="w-1/10 border border-black"></div>
                <div class="w-1/10 border border-black"></div>
                <div class="w-1/10 border border-black"></div>
                <div class="w-1/10 border border-black"></div>
                <div class="w-1/10 border border-black"></div>


            </div>

        @endforeach
    </ul>




</x-pdf-layout>


