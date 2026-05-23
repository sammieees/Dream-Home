<x-guest-layout>

    <form method="POST"
          action="{{ route('register') }}">

        @csrf

        <!-- NAME -->
        <div>

            <x-input-label for="name"
                           :value="__('Full Name')" />

            <x-text-input id="name"
                          class="block mt-1 w-full"
                          type="text"
                          name="name"
                          :value="old('name')"
                          required
                          autofocus
                          autocomplete="name"
                          placeholder="Juan Dela Cruz" />

            <x-input-error :messages="$errors->get('name')"
                           class="mt-2" />

        </div>

        <!-- EMAIL -->
        <div class="mt-4">

            <x-input-label for="email"
                           :value="__('University Email')" />

            <x-text-input id="email"
                          class="block mt-1 w-full"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autocomplete="username"
                          placeholder="jane@university.edu" />

            <x-input-error :messages="$errors->get('email')"
                           class="mt-2" />

        </div>

        <!-- PASSWORD -->
        <div class="mt-4">

            <x-input-label for="password"
                           :value="__('Password')" />

            <x-text-input id="password"
                          class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required
                          autocomplete="new-password"
                          placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')"
                           class="mt-2" />

        </div>

        <!-- CONFIRM PASSWORD -->
        <div class="mt-4">

            <x-input-label for="password_confirmation"
                           :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation"
                          class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation"
                          required
                          autocomplete="new-password"
                          placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password_confirmation')"
                           class="mt-2" />

        </div>

        <!-- ROLE -->
        <div class="mt-4">

            <x-input-label for="role"
                           :value="__('Role')" />

            <select id="role"
                    name="role"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">

                <option value="staff">
                    Staff
                </option>

                <option value="admin">
                    Admin
                </option>

            </select>

            <x-input-error :messages="$errors->get('role')"
                           class="mt-2" />

        </div>

        <!-- BUTTONS -->
        <div class="flex items-center justify-between mt-6">

            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">

                {{ __('Already registered?') }}

            </a>

            <x-primary-button class="ms-4">

                {{ __('Sign Up') }}

            </x-primary-button>

        </div>

    </form>

</x-guest-layout>