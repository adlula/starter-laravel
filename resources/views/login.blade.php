<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>
        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Alpine -->
        <script src="//unpkg.com/alpinejs" defer></script>
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
    </head>

    <body>
        <div class="bg-gray-100 flex items-center justify-center h-screen">
            <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
                <div class="flex justify-center mb-6">
                    <span class="inline-block bg-gray-200 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4" />
                        </svg>
                    </span>
                </div>
                <h2 class="text-2xl font-semibold text-center mb-4">Sign In to your account</h2>
                <p class="text-gray-600 text-center mb-6">Input your email and password.</p>

                @if (session('error'))
                    <div class="text-center bg-red-100 border-red-400 text-red-500 px-4 py-2 rounded-lg mb-3"
                        x-init="setTimeout(() => $el.remove(), 3000)">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                {{-- Login Form --}}
                <form action="{{ route('loginStore') }}" method="POST" x-data="{ loading: false }"
                    @submit.prevent="loading = true; $nextTick(() => $el.submit())">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email
                            <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email"
                            class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            required placeholder="email@example.com" autocomplete="off" value="test@example.com" />
                        {{-- Email Error --}}
                        @error('email')
                            <p x-init="setTimeout(() => $el.remove(), 3000)" class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password <span
                                class="text-red-500">*</span></label>
                        <input name="password" id="password" type="password"
                            class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            required placeholder="••••••••" autocomplete="off" />
                        {{-- Password Error --}}
                        @error('password')
                            <p x-init="setTimeout(() => $el.remove(), 3000)" class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Login Button --}}
                    <div class="w-full">
                        <button type="submit" class="w-full btn btn-accent" :disabled="loading">
                            <span x-show="!loading">Login</span>
                            <span x-show="loading" class="w-full blok">
                                <span class="loading loading-spinner loading-xs"></span>
                                Loading...
                            </span>
                        </button>
                    </div>
                </form>

                {{-- Register Link --}}
                <p class="text-center mt-4 text-sm">
                    Don't have an account? <a href="" class="text-blue-500 hover:underline">Register here</a>.
                </p>
            </div>
        </div>
    </body>

</html>
