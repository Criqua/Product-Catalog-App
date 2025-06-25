<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource with pagination.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage with validation and custom messages.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name'        => 'required|string|max:255',
                'description' => 'nullable|string',
                'price'       => 'required|numeric|min:0',
                'category_id' => 'required|exists:categories,id',
            ],
            [
                'name.required'        => 'El nombre es obligatorio.',
                'name.max'             => 'El nombre no puede tener más de 255 caracteres.',
                'price.required'       => 'El precio es obligatorio.',
                'price.numeric'        => 'El precio debe ser un número.',
                'price.min'            => 'El precio no puede ser negativo.',
                'category_id.required' => 'La categoría es obligatoria.',
                'category_id.exists'   => 'La categoría seleccionada no existe.',
            ]
        );

        Product::create($validated);

        return redirect()
            ->route('products.index')
            ->with('alert', [
                'type'    => 'success',
                'message' => 'Producto creado correctamente.'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product    = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage with validation and custom messages.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'name'        => 'required|string|max:255',
                'description' => 'nullable|string',
                'price'       => 'required|numeric|min:0',
                'category_id' => 'required|exists:categories,id',
            ],
            [
                'name.required'        => 'El nombre es obligatorio.',
                'name.max'             => 'El nombre no puede tener más de 255 caracteres.',
                'price.required'       => 'El precio es obligatorio.',
                'price.numeric'        => 'El precio debe ser un número.',
                'price.min'            => 'El precio no puede ser negativo.',
                'category_id.required' => 'La categoría es obligatoria.',
                'category_id.exists'   => 'La categoría seleccionada no existe.',
            ]
        );

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()
            ->route('products.index')
            ->with('alert', [
                'type'    => 'success',
                'message' => 'Producto actualizado correctamente.'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('alert', [
                'type'    => 'success',
                'message' => 'Producto eliminado correctamente.'
            ]);
    }
}