@extends('layouts.main')

@section('content')
    <div class="md:w-1/2 lg:w-1/3 md:mt-8 lg:mt-10 mx-auto">
        <div class="card">
                <div class="relative bg-white w-full max-w-md h-full md:h-auto m-auto md:rounded flex-col flex p-2">
                    <header class="border-b-2 border-primary flex">
                        <div class="font-thin text-2xl text-smoke-800 py-2">{{ __('Reset Password') }}</div>
                    </header>
                    <section class="my-3 p-4 bg-gray-100 rounded-lg">
                        <form method="POST" action="{{ route('password.email') }}">
                        @csrf

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



                        <div class="flex justify-between items-center py-2 w-full">
                            <div>
                                <button type="submit" class="bg-green-600 text-white hover:bg-green-700 p-2 rounded">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                            <div>
                                <div>
                                    <a class="text-sm text-blue-700 pl-3" href="/login">Cancel</a>
                                </div>
                            </div>
                        </div>

                    </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
