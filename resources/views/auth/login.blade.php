@extends('layouts.user')

@section('content')
    <div class="md:w-1/2 lg:w-1/3 md:mt-8 lg:mt-10 mx-auto">
        <div class="card">
            <div class="relative bg-white w-full max-w-md h-full md:h-auto m-auto md:rounded flex-col flex p-2">
                <header class="border-b-2 border-primary flex">
                    <div>
                        <h3 class="font-thin text-2xl text-tertiary py-2">
                            Sign In
                        </h3>
                    </div>
                </header>
                <section class="my-3 p-4 bg-blue-lightest rounded-lg">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <div class="flex justify-between content-end">
                                <label class="form-label" for="email">Email Address</label>
                                @if ($errors->has('email'))
                                    <span class="font-semibold text-red" role="alert">
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
                                <label class="form-label" for="email">Password</label>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input class="form-input {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   id="password"
                                   type="password"
                                   name="password"
                                   {{--value="{{ old('password') }}"--}}
                                   required>
                        </div>

                        <div class="mb-3">
                            <div class="flex justify-between items-center">
                                <button type="submit"
                                        class="w-20 py-2 bg-white border-b-2 border-tertiary hover:bg-green-lightest text-tertiary text-sm font-bold rounded">
                                    Login
                                </button>
                                <div class="flex items-center">
                                    <input class="" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class=" ml-2 lg:ml-4 text-primary" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            @if (Route::has('password.request'))
                                <a class="text-xs text-blue-light" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection
