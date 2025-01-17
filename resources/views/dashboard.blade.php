<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (auth()->user() && !auth()->user()->hasVerifiedEmail())
            <div class="alert alert-warning">
                Email Anda belum diverifikasi.
                <form action="{{ route('verification.send') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-link">Kirim ulang email verifikasi</button>
                </form>
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
