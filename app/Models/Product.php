<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['category_id', 'name', 'description', 'price', 'stock', 'slug'];

    protected $casts = ['price' => 'decimal:2', 'stock' => 'integer'];

    public function category() { return $this->belongsTo(Category::class); }

    protected function name(): Attribute {
        return Attribute::make(get: fn ($v) => ucfirst($v));
    }
}