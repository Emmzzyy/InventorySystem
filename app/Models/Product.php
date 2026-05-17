<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'name',
    'sku',
    'description',
    'unit_price',
    'quantity',
    'min_stock',
    'image',
    'category_id',
];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class);
    }
    
    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }
    
}
