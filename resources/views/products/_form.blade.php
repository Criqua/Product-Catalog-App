@php
    $isEdit = isset($product) && $product !== null;
@endphp

<form action="{{ $isEdit ? route('products.update', $product) : route('products.store') }}" method="POST" class="space-y-6" novalidate autocomplete="off">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <!-- Nombre -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-800 dark:text-gray-100 mb-1">
            {{ __('products.name') }}
        </label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}" placeholder="e.g.: Camiseta" class="block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#7c3aed] focus:border-[#7c3aed] transition" />
        <div class="@error('name') flex @else hidden @enderror items-center gap-1.5 text-red-600 dark:text-red-400 text-xs mt-1 bg-red-50 dark:bg-[#3C0000] p-1.5 border border-red-300 dark:border-red-700 rounded">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span>@error('name'){{ $message }}@enderror</span>
        </div>
    </div>

    <!-- Precio -->
    <div>
        <label for="price" class="block text-sm font-medium text-gray-800 dark:text-gray-100 mb-1">
            {{ __('products.price') }}
        </label>
        <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price ?? '') }}" placeholder="e.g.: 120.00" class="block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#7c3aed] focus:border-[#7c3aed] transition" />
        <div class="@error('price') flex @else hidden @enderror items-center gap-1.5 text-red-600 dark:text-red-400 text-xs mt-1 bg-red-50 dark:bg-[#3C0000] p-1.5 border border-red-300 dark:border-red-700 rounded">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span>@error('price'){{ $message }}@enderror</span>
        </div>
    </div>

    <!-- Descripción -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-800 dark:text-gray-100 mb-1">
            {{ __('products.description') }}
        </label>
        <textarea name="description" id="description" placeholder="e.g.: Algodón 100%, manga corta" class="block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#7c3aed] focus:border-[#7c3aed] transition">{{ old('description', $product->description ?? '') }}</textarea>
        <div class="@error('description') flex @else hidden @enderror items-center gap-1.5 text-red-600 dark:text-red-400 text-xs mt-1 bg-red-50 dark:bg-[#3C0000] p-1.5 border border-red-300 dark:border-red-700 rounded">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span>@error('description'){{ $message }}@enderror</span>
        </div>
    </div>

    <!-- Categoría -->
    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-800 dark:text-gray-100 mb-1">
            {{ __('products.category') }}
        </label>
        <select name="category_id" id="category_id" required class="block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#7c3aed] focus:border-[#7c3aed] transition">
            <option value="">{{ __('products.select_category') }}</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        <div class="@error('category_id') flex @else hidden @enderror items-center gap-1.5 text-red-600 dark:text-red-400 text-xs mt-1 bg-red-50 dark:bg-[#3C0000] p-1.5 border border-red-300 dark:border-red-700 rounded">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span>@error('category_id'){{ $message }}@enderror</span>
        </div>
    </div>

    <!-- Botones de acción -->
    <div class="flex flex-col gap-3">
        <button type="submit" class="flex-1 inline-flex justify-center items-center gap-2 px-5 py-3 bg-[#7c3aed] hover:bg-[#a78bfa] dark:bg-[#312e81] dark:hover:bg-[#7c3aed] text-white font-semibold rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#7c3aed] transition">
            <i class="fas {{ $isEdit ? 'fa-edit' : 'fa-plus' }}"></i>
            {{ $isEdit ? __('products.edit') : __('products.create') }}
        </button>

        <a href="{{ route('products.index') }}"
           class="flex-1 inline-flex justify-center items-center gap-2 px-5 py-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 font-semibold rounded-lg shadow transition">
            <i class="fas fa-arrow-left"></i>
            {{ __('actions.cancel') }}

        </a>
    </div>
</form>
