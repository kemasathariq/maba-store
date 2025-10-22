<x-guest-layout title="Register">
    <div class="min-h-screen bg-[#0c1220] flex items-center justify-center">
        <div class="max-w-md w-full bg-[#0f1624] p-8 rounded-lg">
            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <x-application-logo class="w-20 h-20 text-gray-400 fill-current" />
            </div>

            <!-- Page Title -->
            <h1 class="text-2xl font-bold text-white text-center mb-8">Register</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-300 mb-2">Name</label>
                    <input type="text" id="name" name="name" :value="old('name')"
                           class="w-full px-4 py-2 rounded bg-[#1a2332] border border-[#2e3b52] text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                           required autofocus autocomplete="name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-300 mb-2">Email</label>
                    <input type="email" id="email" name="email" :value="old('email')"
                           class="w-full px-4 py-2 rounded bg-[#1a2332] border border-[#2e3b52] text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                           required autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-gray-300 mb-2">Password</label>
                    <input type="password" id="password" name="password"
                           class="w-full px-4 py-2 rounded bg-[#1a2332] border border-[#2e3b52] text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                           required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-300 mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="w-full px-4 py-2 rounded bg-[#1a2332] border border-[#2e3b52] text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                           required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex flex-col space-y-4">
                    <button type="submit" class="w-full py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded transition duration-200">
                        REGISTER
                    </button>

                    <div class="flex items-center justify-center text-sm">
                        <a href="{{ route('login') }}" class="text-gray-400 hover:text-gray-200">
                            Already registered?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
