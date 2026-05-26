<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4"
                           :status="session('status')" />

    <form method="POST"
          action="{{ route('login') }}">

        @csrf

        <!-- EMAIL -->
        <div>

            <x-input-label for="email"
                           :value="__('Email')" />

            <x-text-input id="email"
                          class="block mt-1 w-full"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autofocus
                          autocomplete="username" />

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
                          autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')"
                           class="mt-2" />

        </div>

        <!-- ROLE -->
        <div class="mt-4">

            <x-input-label for="role"
                           :value="__('Role')" />

            <select id="role"
                    name="role"
                    required
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">

                <option value="">
                    Select Role
                </option>

                <option value="admin"
                    {{ old('role') == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>

                <option value="staff"
                    {{ old('role') == 'staff' ? 'selected' : '' }}>
                    Staff
                </option>

            </select>

            <x-input-error :messages="$errors->get('role')"
                           class="mt-2" />

        </div>

        <!-- REMEMBER ME -->
        <div class="block mt-4">

            <label for="remember_me"
                   class="inline-flex items-center">

                <input id="remember_me"
                       type="checkbox"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                       name="remember">

                <span class="ms-2 text-sm text-gray-600">

                    {{ __('Remember me') }}

                </span>

            </label>

        </div>

        <!-- BUTTONS -->
        <div class="flex items-center justify-between mt-4">

            @if (Route::has('password.request'))

                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('password.request') }}">

                    {{ __('Forgot your password?') }}

                </a>

            @endif

            <x-primary-button>

                {{ __('Log in') }}

            </x-primary-button>

        </div>

               <!-- REGISTER -->
        <div class="mt-6 text-center text-sm text-gray-600">

                Don't have an account?

            <a href="{{ route('register') }}"
                  class="underline text-indigo-600 hover:text-indigo-800 transition">

                      Register here

             </a>

        </div>

    </form>

</x-guest-layout>