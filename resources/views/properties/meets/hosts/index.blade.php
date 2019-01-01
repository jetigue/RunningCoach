@extends('layouts.user')

@section('content')
    <h3 class="font-light text-2xl pb-1 text-primary">Meet Hosts</h3>
    <div class="table-container">
        <div class="table-header">
            <div class="flex justify-between">
                <div class="flex-1">
                    <p class="text-primary font-semibold">Name</p>
                </div>
            </div>
            <div class="flex content-around">
                <button class="flex justify-around items-center border border-secondary hover:bg-secondary text-secondary hover:text-white font-bold rounded-full w-18">
                    <i class="fas fa-plus"></i>
                    <span class="">Add</span>
                </button>
            </div>
        </div>
        <div>
            <div class="table-body">
                @forelse($hosts as $host)
                    <div class="table-row flex justify-between hover:bg-primary-lightest">
                        <div class="flex">
                            <div class="md:text-base text-grey-darker flex-1 md:w-1/2           lg:w-1/3">
                                {{ $host->name }}
                            </div>
                        </div>
                        <div class="flex pr-4 md:justify-between">
                            <div class="flex">
                                <i class="fas fa-angle-double-down text-indigo mr-4"></i>
                            </div>
                            <div class="hidden">
                                <i class="fas fa-edit text-green"></i>
                            </div>
                            <div class="hidden">
                                <i class="fas fa-trash text-maroon"></i>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>No Hosts yet.</h3>
                @endforelse
            </div>
        </div>
@endsection