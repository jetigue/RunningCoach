@if($athlete->grad_year == '2025')
    <div class="flex flex-col w-full">
        @if($crossResults2020->count() > 0)
        <athlete-cross-results :data="{{ $crossResults2021 }}">
            Freshman Season
        </athlete-cross-results>
        @endif
    </div>
@elseif($athlete->grad_year == '2024')
    <div class="flex flex-col w-full">
        {{--                        @if($crossResults2022->count() > 0)--}}
        {{--                            <athlete-cross-results :data="{{ $crossResults2022 }}">--}}
        {{--                                Senior Season--}}
        {{--                            </athlete-cross-results>--}}
        {{--                        @endif--}}

        {{--                        @if($crossResults2021->count() > 0)--}}
        {{--                            <athlete-cross-results :data="{{ $crossResults2021 }}">--}}
        {{--                                Junior Season--}}
        {{--                            </athlete-cross-results>--}}
        {{--                        @endif--}}

        @if($crossResults2020->count() > 0)--}}
            <athlete-cross-results :data="{{ $crossResults2021 }}">
                Sophomore Season
            </athlete-cross-results>
        @endif

        @if($crossResults2020->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2020 }}">
                Freshman Season
            </athlete-cross-results>
        @endif
    </div>

@elseif($athlete->grad_year == '2023')
    <div class="flex flex-col w-full">
        {{--                        @if($crossResults2022->count() > 0)--}}
        {{--                            <athlete-cross-results :data="{{ $crossResults2022 }}">--}}
        {{--                                Senior Season--}}
        {{--                            </athlete-cross-results>--}}
        {{--                        @endif--}}

        @if($crossResults2021->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2021 }}">
                Junior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2020->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2020 }}">
                Sophomore Season
            </athlete-cross-results>
        @endif

        @if($crossResults2019->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2019 }}">
                Freshman Season
            </athlete-cross-results>
        @endif
    </div>
@elseif($athlete->grad_year == '2022')
    <div class="flex flex-col w-full">
        @if($crossResults2021->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2021 }}">
                Senior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2020->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2020 }}">
                Junior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2019->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2019 }}">
                Sophomore Season
            </athlete-cross-results>
        @endif

        @if($crossResults2018->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2018 }}">
                Freshman Season
            </athlete-cross-results>
        @endif
    </div>
@elseif($athlete->grad_year == '2021')
    <div class="flex flex-col w-full">
        @if($crossResults2020->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2020 }}">
                Senior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2019->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2019 }}">
                Junior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2018->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2018 }}">
                Sophomore Season
            </athlete-cross-results>
        @endif

        @if($crossResults2017->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2017 }}">
                Freshman Season
            </athlete-cross-results>
        @endif
    </div>
@elseif($athlete->grad_year == '2020')
    <div class="flex flex-col w-full">
        @if($crossResults2019->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2019 }}">
                Senior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2018->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2018 }}">
                Junior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2017->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2017 }}">
                Sophomore Season
            </athlete-cross-results>
        @endif

        @if($crossResults2016->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2016 }}">
                Freshman Season
            </athlete-cross-results>
        @endif
    </div>
@elseif($athlete->grad_year == '2019')
    <div class="flex flex-col w-full">
        @if($crossResults2018->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2018 }}">
                Senior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2017->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2017 }}">
                Junior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2016->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2016 }}">
                Sophomore Season
            </athlete-cross-results>
        @endif

        @if($crossResults2015->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2015 }}">
                Freshman Season
            </athlete-cross-results>
        @endif
    </div>
@elseif($athlete->grad_year == '2018')
    <div class="flex flex-col w-full">
        @if($crossResults2017->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2017 }}">
                Senior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2016->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2016 }}">
                Junior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2015->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2015 }}">
                Sophomore Season
            </athlete-cross-results>
        @endif

        @if($crossResults2014->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2014 }}">
                Freshman Season
            </athlete-cross-results>
        @endif
    </div>
@elseif($athlete->grad_year == '2017')
    <div class="flex flex-col w-full">
        @if($crossResults2016->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2016 }}">
                Senior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2015->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2015 }}">
                Junior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2014->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2014 }}">
                Sophomore Season
            </athlete-cross-results>
        @endif

        @if($crossResults2013->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2013 }}">
                Freshman Season
            </athlete-cross-results>
        @endif
    </div>
@elseif($athlete->grad_year == '2016')
    <div class="flex flex-col w-full">
        @if($crossResults2015->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2015 }}">
                Senior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2014->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2014 }}">
                Junior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2013->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2013 }}">
                Sophomore Season
            </athlete-cross-results>
        @endif

        @if($crossResults2012->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2012 }}">
                Freshman Season
            </athlete-cross-results>
        @endif
    </div>
@elseif($athlete->grad_year == '2015')
    <div class="flex flex-col w-full">
        @if($crossResults2014->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2014 }}">
                Senior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2013->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2013 }}">
                Junior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2012->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2012 }}">
                Sophomore Season
            </athlete-cross-results>
        @endif

        @if($crossResults2011->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2011 }}">
                Freshman Season
            </athlete-cross-results>
        @endif
    </div>
@elseif($athlete->grad_year == '2014')
    <div class="flex flex-col w-full">
        @if($crossResults2013->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2013 }}">
                Senior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2012->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2012 }}">
                Junior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2011->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2011 }}">
                Sophomore Season
            </athlete-cross-results>
        @endif

        @if($crossResults2010->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2010 }}">
                Freshman Season
            </athlete-cross-results>
        @endif
    </div>
@elseif($athlete->grad_year == '2013')
    <div class="flex flex-col w-full">
        @if($crossResults2012->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2012 }}">
                Senior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2011->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2011 }}">
                Junior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2010->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2010 }}">
                Sophomore Season
            </athlete-cross-results>
        @endif

        @if($crossResults2009->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2009 }}">
                Freshman Season
            </athlete-cross-results>
        @endif
    </div>
@elseif($athlete->grad_year == '2012')
    <div class="flex flex-col w-full">
        @if($crossResults2011->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2011 }}">
                Senior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2010->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2010 }}">
                Junior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2009->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2009 }}">
                Sophomore Season
            </athlete-cross-results>
        @endif
    </div>
@elseif($athlete->grad_year == '2011')
    <div class="flex flex-col w-full">
        @if($crossResults2010->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2010 }}">
                Senior Season
            </athlete-cross-results>
        @endif

        @if($crossResults2009->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2009 }}">
                Junior Season
            </athlete-cross-results>
        @endif
    </div>
@elseif($athlete->grad_year == '2010')
    <div class="flex flex-col w-full">
        @if($crossResults2009->count() > 0)
            <athlete-cross-results :data="{{ $crossResults2009 }}">
                Senior Season
            </athlete-cross-results>
        @endif
    </div>
@endif
