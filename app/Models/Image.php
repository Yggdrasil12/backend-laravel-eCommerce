<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;

    protected $fillable = ['product_id','image_url'];

    // Relación con el producto
    public function producto()
    {
        return $this->belongsTo(Product::class);
    }
}
