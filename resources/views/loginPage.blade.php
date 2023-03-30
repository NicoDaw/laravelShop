<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @embedstyles('C:\xampp\htdocs\laravel\proyecto1\resources\css\login.css')
</head>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<body style="overflow: hidden">
    <div style="width: 50vw">
        <img class="loginPageImage"
            src="https://assets.dicebreaker.com/slay-the-spire-the-board-game-enemy-cards.png/BROK/thumbnail/1600x900/quality/100/slay-the-spire-the-board-game-enemy-cards.png" />
    </div>

    <div class="formContainer">
        <x-guest-layout>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div style="display: flex; flex-direction: column; align-items: center">
                    <!-- Captcha -->
                    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                    <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <x-primary-button class="ml-3">
                        {{ __('Log in') }}
                    </x-primary-button>


                </div>

            </form>
            <div style="display: flex; justify-content: center; margin-left: 10px"><span
                    style="text-align: center">or</span></div>

            <div class="inputsContainer">
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"
                    style="align-self: center"><input type="submit" class="loginButton registerButton "
                        value="REGISTER"></a>
            </div>
        </x-guest-layout>

    </div>


</body>

</html>
