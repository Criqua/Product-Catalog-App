<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource with pagination.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage with validation and custom messages.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name'        => 'required|string|max:255|unique:categories,name',
                'description' => 'nullable|string|max:1000',
            ],
            [
                'name.required' => 'El nombre es obligatorio.',
                'name.unique'   => 'Ya existe una categoría con ese nombre.',
                'name.max'      => 'El nombre no puede tener más de 255 caracteres.',
                'description.max' => 'La descripción no puede tener más de 1000 caracteres.',
            ]
        );

        Category::create($validated);

        return redirect()
            ->route('categories.index')
            ->with('alert', [
                'type'    => 'success',
                'message' => 'Categoría creada correctamente.'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage with validation and custom messages.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate(
            [
                'name'        => 'required|string|max:255|unique:categories,name,' . $category->id,
                'description' => 'nullable|string|max:1000',
            ],
            [
                'name.required' => 'El nombre es obligatorio.',
                'name.unique'   => 'Ya existe una categoría con ese nombre.',
                'name.max'      => 'El nombre no puede tener más de 255 caracteres.',
                'description.max' => 'La descripción no puede tener más de 1000 caracteres.',
            ]
        );

        $category->update($validated);

        return redirect()
            ->route('categories.index')
            ->with('alert', [
                'type'    => 'success',
                'message' => 'Categoría actualizada correctamente.'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('alert', [
                'type'    => 'success',
                'message' => 'Categoría eliminada correctamente.'
            ]);
    }
}
