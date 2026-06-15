<x-guest-layout>

<div class="text-center mb-6">
    <x-application-logo class="w-20 h-20 mx-auto text-blue-600" />

    <h2 class="text-3xl font-bold text-blue-700 mt-3">
        Selamat Datang Kembali!
    </h2>

    <p class="text-gray-500">
        Silakan login untuk melanjutkan
    </p>
</div>

<x-auth-session-status class="mb-4" :status="session('status')" />

@if ($errors->any())
    <div class="mb-4 rounded-xl border-l-4 border-red-500 bg-red-50 p-4 shadow-sm">
        <div class="flex items-center">
            <span class="text-red-600 text-xl mr-2">❌</span>

            <div>
                <h4 class="font-semibold text-red-700">
                    Login Gagal
                </h4>

                <p class="text-sm text-red-600">
                    Email atau password yang Anda masukkan tidak sesuai.
                </p>
            </div>
        </div>
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-4">
        <label class="block mb-2 font-semibold">
            Email
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            placeholder="Masukkan email Anda"
            required
            autofocus>
    </div>

    <div class="mb-4">
        <label class="block mb-2 font-semibold">
            Password
        </label>

        <input
            type="password"
            name="password"
            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            placeholder="Masukkan password Anda"
            required>
    </div>

    <div class="mb-5">
        <label class="inline-flex items-center">
            <input
                type="checkbox"
                name="remember"
                class="rounded border-gray-300 text-blue-600 shadow-sm">

            <span class="ml-2 text-gray-700">
                Remember me
            </span>
        </label>
    </div>

    <div class="flex justify-between items-center">

        <a href="{{ route('register') }}"
           class="text-blue-600 hover:text-blue-800 hover:underline">
            Register
        </a>

        <div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-blue-600 hover:text-blue-800 hover:underline mr-4">
                    Lupa Password?
                </a>
            @endif

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl shadow-md transition">
                LOG IN
            </button>
        </div>

    </div>

</form>

</x-guest-layout>