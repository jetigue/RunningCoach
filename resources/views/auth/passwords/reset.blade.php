@extends('layouts.main')

@section('content')
    <div class="md:w-1/2 lg:w-1/3 md:mt-8 lg:mt-10 mx-auto">
        <div class="card">
            <div class="relative bg-white w-full max-w-md h-full md:h-auto m-auto md:rounded flex-col flex p-2">
                <header class="border-b-2 border-primary flex">
                    <div>
                        <h3 class="font-thin text-2xl text-smoke-800 py-2">
                            {{ __('Reset Password') }}
                        </h3>
                    </div>
                </header>
                <section class="my-3 p-4 bg-gray-100 rounded-lg">
                    <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <div class="flex justify-between items-center">
                                <label class="form-label" for="email">Email Address</label>
                                @if ($errors->has('email'))
                                    <span class="font-semibold text-red-700 text-xs" role="alert">
                                            {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                            <input class="form-input {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   id="email"
                                   type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required autofocus>
                        </div>

                        <div class="mb-4">
                            <div class="flex justify-between content-end">
                                <label class="form-label" for="password">Password</label>
                                @if ($errors->has('password'))
                                    <span class="font-semibold text-red-700 text-xs" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input class="form-input {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   id="password"
                                   type="password"
                                   name="password"
                                   required>
                        </div>

                        <div class="mb-4">
                            <div class="flex justify-between content-end">
                                <label class="form-label" for="password">Confirm Password</label>
                            </div>
                            <input class="form-input {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   id="password-confirm"
                                   type="password"
                                   name="password_confirmation"
                                   required>
                        </div>

                        <div class="flex justify-between items-center w-full">
                            <button type="submit" class="py-2 bg-crimson-500 hover:bg-crimson-600 text-white text-sm font-bold rounded">
                                {{ __('Reset Password') }}
                            </button>
                            <div>
                                <a class="text-sm text-blue-700 pl-3" href="/login">Cancel</a>
                            </div>
                        </div>
                    </form>
                </section>



{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

{{--                                @if ($errors->has('password'))--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}



            </div>
        </div>
    </div>
@endsection
