<x-guest-layout>
    <x-authentication-card style="background-color: black;">
        <x-slot name="logo">
            <div class="logo-login" style="width: 100%; height: 100%;">
                <a href="/"><img src="../images/image-login.png" width="200px" height="200px" alt=""></a>
            </div>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4" style="justify-content: space-between;">

                <x-button class="ms-4" style="margin-right: 10px;">
                    <a href="/register">REGISTER</a>
                </x-button>


                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif



                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>



            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>