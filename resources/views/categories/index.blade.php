<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#7c3aed]/20 dark:bg-[#312e81]/30">
                    <i class="fas fa-folder text-xl text-[#7c3aed] dark:text-[#a78bfa]"></i>
                </span>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100">
                    {{ __('Categorías') }}
                </h2>
            </div>
            <a href="{{ route('categories.create') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-[#7c3aed] hover:bg-[#a78bfa] dark:bg-[#312e81] dark:hover:bg-[#7c3aed] text-white font-semibold rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#7c3aed] dark:focus:ring-offset-gray-900 transition">
                <i class="fas fa-plus"></i>
                {{ __('Crear categoría') }}
            </a>
        </div>
    </x-slot>

    <div class="py-8 sm:py-12 bg-gradient-to-r from-[#7c3aed]/10 to-[#a78bfa]/10 dark:from-gray-900 dark:to-gray-800 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="overflow-x-auto bg-white/80 dark:bg-gray-800 shadow-xl rounded-xl">
                <table class="min-w-full divide-y divide-[#7c3aed]/20 dark:divide-gray-700">
                    <thead class="bg-[#7c3aed] dark:bg-[#312e81]">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                {{ __('Nombre') }}
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                {{ __('Descripción') }}
                            </th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-white">
                                {{ __('Acciones') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-[#7c3aed]/20 dark:divide-gray-700">
                        @forelse($categories as $category)
                            <tr class="even:bg-[#a78bfa]/10 dark:even:bg-gray-800 transition">
                                <td class="px-6 py-4 text-[#231f20] dark:text-gray-300">
                                    {{ $category->name }}
                                </td>
                                <td class="px-6 py-4 text-[#231f20] dark:text-gray-300">
                                    {{ $category->description }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div x-data="{ showModal{{ $category->id }}: false }"
                                         class="flex items-center justify-center gap-2">
                                        <!-- Ver detalles -->
                                        <button @click="showModal{{ $category->id }} = true"
                                                title="{{ __('Ver detalles') }}"
                                                class="w-8 h-8 flex items-center justify-center bg-[#7c3aed] hover:bg-[#a78bfa] dark:bg-[#312e81] dark:hover:bg-[#7c3aed] text-white rounded-full transition">
                                            <i class="fas fa-eye text-sm"></i>
                                        </button>

                                        <!-- Editar -->
                                        <a href="{{ route('categories.edit', $category) }}"
                                           title="{{ __('Editar') }}"
                                           class="w-8 h-8 flex items-center justify-center bg-yellow-500 hover:bg-yellow-400 text-white rounded-full transition">
                                            <i class="fas fa-pen text-sm"></i>
                                        </a>

                                        <!-- Eliminar -->
                                        <form action="{{ route('categories.destroy', $category) }}"
                                              method="POST"
                                              id="delete-category-{{ $category->id }}"
                                              class="inline-block">
                                            @csrf @method('DELETE')
                                            <button type="button"
                                                    class="swal-confirm w-8 h-8 flex items-center justify-center bg-red-600 hover:bg-red-500 text-white rounded-full transition"
                                                    data-form-id="delete-category-{{ $category->id }}"
                                                    data-title="{{ __('Eliminar categoría') }}"
                                                    data-text="{{ __('¿Seguro que deseas eliminar la categoría') }} {{ $category->name }}?"
                                                    data-icon="warning"
                                                    data-confirm="{{ __('Sí, eliminar') }}"
                                                    data-cancel="{{ __('Cancelar') }}"
                                                    title="{{ __('Eliminar') }}">
                                                <i class="fas fa-trash text-sm"></i>
                                            </button>
                                        </form>

                                        <!-- Modal de detalles -->
                                        <div x-show="showModal{{ $category->id }}"
                                             x-cloak
                                             @click.outside="showModal{{ $category->id }} = false"
                                             x-transition.opacity
                                             class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                                            <div @click.outside="showModal{{ $category->id }} = false"
                                                 class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white w-full max-w-md mx-4 p-6 rounded shadow-lg overflow-y-auto max-h-[90vh] transition-colors">
                                                <div class="flex justify-between items-center mb-4">
                                                    <h2 class="text-xl font-semibold">
                                                      {{ __('Detalles de la categoría') }}
                                                    </h2>
                                                    <button @click="showModal{{ $category->id }} = false"
                                                            class="text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition text-xl">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </div>
                                                <div class="space-y-4 text-left">
                                                    <div>
                                                        <label class="block text-gray-700 dark:text-gray-300 mb-1">
                                                          {{ __('categories.name') }}
                                                        </label>
                                                        <p class="bg-gray-100 dark:bg-gray-800 px-3 py-2 rounded">
                                                            {{ $category->name }}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700 dark:text-gray-300 mb-1">
                                                          {{ __('categories.description') }}
                                                        </label>
                                                        <p class="bg-gray-100 dark:bg-gray-800 px-3 py-2 rounded">
                                                            {{ $category->description }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="mt-6 text-right">
                                                    <button @click="showModal{{ $category->id }} = false"
                                                            class="bg-gray-200 hover:bg-[#7c3aed] dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white px-4 py-2 rounded transition">
                                                        {{ __('Cerrar') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-400">
                                    {{ __('No hay categorías registradas.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- Paginación --}}
            <div class="mt-6">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-app-layout>