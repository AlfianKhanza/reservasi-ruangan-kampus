<x-guest-layout>

<div class="text-center mb-6">
    <x-application-logo class="w-20 h-20 mx-auto text-blue-600" />

    <h2 class="text-3xl font-bold text-blue-700 mt-3">
        Buat Akun Baru
    </h2>

    <p class="text-gray-500">
        Daftar untuk menggunakan sistem reservasi ruangan
    </p>
</div>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-4">
        <label class="block mb-2 font-semibold">
            Nama Lengkap
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            class="w-full rounded-lg border-gray-300 shadow-sm"
            required
            autofocus>
    </div>

    <div class="mb-4">
        <label class="block mb-2 font-semibold">
            Email
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            class="w-full rounded-lg border-gray-300 shadow-sm"
            required>
    </div>

    <div class="mb-4">
        <label class="block mb-2 font-semibold">
            Password
        </label>

        <input
            type="password"
            name="password"
            class="w-full rounded-lg border-gray-300 shadow-sm"
            required>
    </div>

    <div class="mb-4">
        <label class="block mb-2 font-semibold">
            Konfirmasi Password
        </label>

        <input
            type="password"
            name="password_confirmation"
            class="w-full rounded-lg border-gray-300 shadow-sm"
            required>
    </div>

    <div class="flex justify-between items-center">

        <a href="{{ route('login') }}"
           class="text-blue-600 hover:underline">
            Sudah punya akun?
        </a>

        <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
            REGISTER
        </button>

    </div>

</form>

</x-guest-layout>