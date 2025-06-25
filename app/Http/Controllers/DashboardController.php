<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $categoriesCount = Category::count();
        $productsCount   = Product::count();

        return view('dashboard', compact('categoriesCount', 'productsCount'));
    }
}