<x-guest-layout>
    <style>
        /* CSS for styling purposes */
        .form-container {
            display: flex; /* Use flexbox to align items horizontally */
        }
        .form-container > div {
            margin-right: 20px; /* Add some spacing between the form fields */
        }
    </style>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-container">
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="middle" :value="__('Middle initial')" />
                <x-text-input id="middle_initial" class="block mt-1 w-full" type="text" name="middle_initial" :value="old('middle_initial')" required autofocus autocomplete="middle_initial" />
                <x-input-error :messages="$errors->get('middle_initial')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
        </div>

        <!-- Student ID -->
        <div class="mt-4">
            <x-input-label for="student_ID" :value="__('Student ID')" />
            <x-text-input id="student_ID" class="block mt-1 w-full" type="text" name="student_ID" :value="old('student_ID')" required autocomplete="" />
            <x-input-error :messages="$errors->get('student_ID')" class="mt-2" />
                <p class="text-sm text-gray-500 mt-1">*Note: Student ID must be in the format 21-****-***</p>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />


        </div>

        <div>
            <x-input-label for="year_level" :value="__('Year level')" />
            <select id="year_level" name="year_level" class="block mt-1 w-full form-select">
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
            </select>
        </div>
        {{-- <input type="hidden" name="departmentID" value="1"> --}}

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
