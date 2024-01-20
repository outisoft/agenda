<x-guest-layout>
    <form action="{{ route('agenda.store') }}" method="POST">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name"
                class="border-gray-300 hover:border-pinero-200 focus:border-pinero-300 focus:ring-pinero-300 rounded-md shadow-sm block mt-1 w-full"
                type="text" name="name" :value="old('name')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Job -->
        <div class="mt-3">
            <x-input-label for="job" :value="__('Job')" />
            <x-text-input id="job"
                class="border-gray-300 hover:border-pinero-200 focus:border-pinero-300 focus:ring-pinero-300 rounded-md shadow-sm block mt-1 w-full"
                type="text" name="job" :value="old('job')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('job')" class="mt-2" />
        </div>

        <!-- Departament -->
        <div class="mt-3">
            <x-input-label for="departament" :value="__('Departament')" />
            <x-text-input id="departament"
                class="border-gray-300 hover:border-pinero-200 focus:border-pinero-300 focus:ring-pinero-300 rounded-md shadow-sm block mt-1 w-full"
                type="text" name="departament" :value="old('departament')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('departament')" class="mt-2" />
        </div>

        <!-- Hotel -->
        <div class="mt-3">
            <x-input-label for="hotel" :value="__('Hotel')" />
            <x-text-input id="hotel"
                class="border-gray-300 hover:border-pinero-200 focus:border-pinero-300 focus:ring-pinero-300 rounded-md shadow-sm block mt-1 w-full"
                type="text" name="hotel" :value="old('hotel')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('hotel')" class="mt-2" />
        </div>

        <!-- Extension -->
        <div class="mt-3">
            <x-input-label for="extension" :value="__('Extension')" />
            <x-text-input id="extension"
                class="border-gray-300 hover:border-pinero-200 focus:border-pinero-300 focus:ring-pinero-300 rounded-md shadow-sm block mt-1 w-full"
                type="text" name="extension" :value="old('extension')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('extension')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                class="border-gray-300 hover:border-pinero-200 focus:border-pinero-300 focus:ring-pinero-300 rounded-md shadow-sm block mt-1 w-full"
                type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4 bg-pinero-400 hover:bg-pinero-500 focus:bg-pinero-300">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
