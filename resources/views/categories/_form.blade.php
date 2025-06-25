@php
    $isEdit = isset($category) && $category !== null;
@endphp

<form action="{{ $isEdit ? route('categories.update', $category) : route('categories.store') }}" method="POST" class="space-y-6" novalidate autocomplete="off">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <!-- Nombre -->
    <div>
        <label for="name" class="block text-sm font-medium text-[#231f20] dark:text-gray-200 mb-1">
            {{ __('categories.name') }}
        </label>
        <input type="text" name="name" id="name" value="{{ old('name', $category->name ?? '') }}" placeholder="e.g.: Electrónica" class="block w-full px-4 py-2 bg-white/80 dark:bg-gray-700 border border-[#0b545b]/20 dark:border-gray-600 rounded-lg text-[#231f20] dark:text-gray-100 placeholder-[#0b545b]/50 dark:placeholder-[#ffffff]/20 focus:outline-none focus:ring-2 focus:ring-[#31c0d3] focus:border-[#31c0d3] transition"/>
        <div class="@error('name') flex @else hidden @enderror items-center gap-1.5 text-red-600 dark:text-red-400 text-xs mt-1 bg-red-50 dark:bg-[#3C0000] p-1.5 border border-red-300 dark:border-red-700 rounded">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span>@error('name'){{ $message }}@enderror</span>
        </div>
    </div>

    <!-- Descripción -->
    <div>
        <label for="description" class="block text-sm font-medium text-[#231f20] dark:text-gray-200 mb-1">
            {{ __('categories.description') }}
        </label>
        <textarea name="description" id="description" placeholder="e.g.: Dispositivos electrónicos" class="block w-full px-4 py-2 bg-white/80 dark:bg-gray-700 border border-[#0b545b]/20 dark:border-gray-600 rounded-lg text-[#231f20] dark:text-gray-100 placeholder-[#0b545b]/50 dark:placeholder-[#ffffff]/20 focus:outline-none focus:ring-2 focus:ring-[#31c0d3] focus:border-[#31c0d3] transition">{{ old('description', $category->description ?? '') }}</textarea>
        <div class="@error('description') flex @else hidden @enderror items-center gap-1.5 text-red-600 dark:text-red-400 text-xs mt-1 bg-red-50 dark:bg-[#3C0000] p-1.5 border border-red-300 dark:border-red-700 rounded">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span>@error('description'){{ $message }}@enderror</span>
        </div>
    </div>

    <!-- Botones de acción-->
    <div class="flex flex-col gap-3">
        <button type="submit" class="flex-1 inline-flex justify-center items-center gap-2 px-5 py-3 bg-[#7c3aed] hover:bg-[#a78bfa] dark:bg-[#312e81] dark:hover:bg-[#7c3aed] text-white font-semibold rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#7c3aed] transition">
            <i class="fas {{ $isEdit ? 'fa-edit' : 'fa-plus' }}"></i>
            {{ $isEdit ? __('categories.edit') : __('categories.create') }}
        </button>

        <a href="{{ route('categories.index') }}" class="w-full inline-flex justify-center items-center gap-2 px-4 py-2 text-[#231f20] dark:text-gray-300 hover:bg-[#31c0d3]/10 dark:hover:bg-gray-700 rounded-lg transition">
            <i class="fas fa-arrow-left"></i>
            {{ __('actions.cancel') }}
        </a>
    </div>
</form>
