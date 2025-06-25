<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#7c3aed]/20 dark:bg-[#312e81]/30">
                <i class="fas fa-chart-line text-xl text-[#7c3aed] dark:text-[#a78bfa]"></i>
            </span>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-[#7c3aed]/10 to-[#a78bfa]/10 dark:from-gray-900 dark:to-gray-800 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-500 dark:text-gray-400 text-sm uppercase font-medium">
                            {{ __('products.list') }}
                        </div>
                        <div class="mt-2 text-3xl font-bold text-indigo-600 dark:text-indigo-400">
                            {{ $productsCount }}
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-gray-500 dark:text-gray-400 text-sm uppercase font-medium">
                            {{ __('categories.list') }}
                        </div>
                        <div class="mt-2 text-3xl font-bold text-green-600 dark:text-green-400">
                            {{ $categoriesCount }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
