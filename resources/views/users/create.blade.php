<x-guest-layout>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name"
                class="border-gray-300 hover:border-pinero-200 focus:border-pinero-300 focus:ring-pinero-300 rounded-md shadow-sm block mt-1 w-full"
                type="text" name="name" :value="old('name')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                class="border-gray-300 hover:border-pinero-200 focus:border-pinero-300 focus:ring-pinero-300 rounded-md shadow-sm block mt-1 w-full"
                type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password"
                class="border-gray-300 hover:border-pinero-200 focus:border-pinero-300 focus:ring-pinero-300 rounded-md shadow-sm block mt-1 w-full"
                type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation"
                class="border-gray-300 hover:border-pinero-200 focus:border-pinero-300 focus:ring-pinero-300 rounded-md shadow-sm block mt-1 w-full"
                type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4 bg-pinero-400 hover:bg-pinero-500 focus:bg-pinero-300">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
