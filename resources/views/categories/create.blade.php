<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#7c3aed]/20 dark:bg-[#312e81]/30">
                <i class="fas fa-folder-plus text-xl text-[#7c3aed] dark:text-[#a78bfa]"></i>
            </span>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100">
                {{ __('categories.create') }}
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen py-12 bg-white/10 dark:bg-gray-900 transition-colors">
        <div class="max-w-lg mx-auto bg-white/80 dark:bg-gray-800/80 border border-[#0b545b]/20 dark:border-gray-700 shadow-lg p-8 rounded-2xl">
            @include('categories._form')
        </div>
    </div>
</x-app-layout>
