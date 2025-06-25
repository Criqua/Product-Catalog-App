<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
    ];

    /**
     * Un producto pertenece a una sola categoría...
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
