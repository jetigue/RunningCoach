@if($athlete->grad_year == '2023')
    @if($trackResults2020->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Freshman Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2020TrackResults')
        </div>
    @endif
@endif
@if($athlete->grad_year == '2022')
    @if($trackResults2020->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Sophomore Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2020TrackResults')
        </div>
    @endif

    @if($trackResults2019->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Freshman Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2019TrackResults')
        </div>
    @endif
@endif

@if($athlete->grad_year == '2021')
    @if($trackResults2020->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Junior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2020TrackResults')
        </div>
    @endif

    @if($trackResults2019->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Sophomore Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2019TrackResults')
        </div>
    @endif

    @if($trackResults2018->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Freshman Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2018TrackResults')
        </div>
    @endif
@endif

@if($athlete->grad_year == '2020')
    @if($trackResults2020->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Senior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2020TrackResults')
        </div>
    @endif

    @if($trackResults2019->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Junior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2019TrackResults')
        </div>
    @endif

    @if($trackResults2018->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Sophomore Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2018TrackResults')
        </div>
    @endif

    @if($trackResults2017->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Freshman Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2017TrackResults')
        </div>
    @endif
@endif

@if($athlete->grad_year == '2019')
    @if($trackResults2019->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Senior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2019TrackResults')
        </div>
    @endif

    @if($trackResults2018->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Junior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2018TrackResults')
        </div>
    @endif

    @if($trackResults2017->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Sophomore Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2017TrackResults')
        </div>
    @endif

    @if($trackResults2016->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Freshman Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2016TrackResults')
        </div>
    @endif
@endif

@if($athlete->grad_year == '2018')
    @if($trackResults2018->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Senior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2018TrackResults')
        </div>
    @endif

    @if($trackResults2017->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Junior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2017TrackResults')
        </div>
    @endif

    @if($trackResults2016->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Sophomore Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2016TrackResults')
        </div>
    @endif

    @if($trackResults2015->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Freshman Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2015TrackResults')
        </div>
    @endif
@endif

@if($athlete->grad_year == '2017')
    @if($trackResults2017->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Senior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2017TrackResults')
        </div>
    @endif

    @if($trackResults2016->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Junior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2016TrackResults')
        </div>
    @endif

    @if($trackResults2015->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Sophomore Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2015TrackResults')
        </div>
    @endif

    @if($trackResults2014->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Freshman Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2014TrackResults')
        </div>
    @endif
@endif

@if($athlete->grad_year == '2016')
    @if($trackResults2016->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Senior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2016TrackResults')
        </div>
    @endif

    @if($trackResults2015->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Junior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2015TrackResults')
        </div>
    @endif

    @if($trackResults2014->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Sophomore Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2014TrackResults')
        </div>
    @endif

    @if($trackResults2013->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Freshman Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2013TrackResults')
        </div>
    @endif
@endif

@if($athlete->grad_year == '2015')
    @if($trackResults2015->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Senior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2015TrackResults')
        </div>
    @endif

    @if($trackResults2014->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Junior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2014TrackResults')
        </div>
    @endif

    @if($trackResults2013->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Sophomore Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2013TrackResults')
        </div>
    @endif

    @if($trackResults2012->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Freshman Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2012TrackResults')
        </div>
    @endif
@endif

@if($athlete->grad_year == '2014')
    @if($trackResults2014->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Senior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2014TrackResults')
        </div>
    @endif

    @if($trackResults2013->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Junior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2013TrackResults')
        </div>
    @endif

    @if($trackResults2012->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Sophomore Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2012TrackResults')
        </div>
    @endif

    @if($trackResults2011->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Freshman Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2011TrackResults')
        </div>
    @endif
@endif

@if($athlete->grad_year == '2013')
    @if($trackResults2013->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Senior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2013TrackResults')
        </div>
    @endif

    @if($trackResults2012->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Junior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2012TrackResults')
        </div>
    @endif

    @if($trackResults2011->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Sophomore Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2011TrackResults')
        </div>
    @endif

    @if($trackResults2010->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Freshman Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2010TrackResults')
        </div>
    @endif
@endif

@if($athlete->grad_year == '2012')
    @if($trackResults2012->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Senior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2012TrackResults')
        </div>
    @endif

    @if($trackResults2011->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Junior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2011TrackResults')
        </div>
    @endif

    @if($trackResults2010->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Sophomore Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2010TrackResults')
        </div>
    @endif
@endif

@if($athlete->grad_year == '2011')
    @if($trackResults2011->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Senior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2011TrackResults')
        </div>
    @endif

    @if($trackResults2010->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Junior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2010TrackResults')
        </div>
    @endif
@endif

@if($athlete->grad_year == '2010')
    @if($trackResults2010->count() > 0)
        <div class="font-semibold text-xl text-gray-600 text-italic">
            Senior Season
        </div>
        <div class="flex flex-col w-full">
            @include('partials.athleteResultsTableHeader')
            @include('partials.trackResults.athlete2010TrackResults')
        </div>
    @endif
@endif
