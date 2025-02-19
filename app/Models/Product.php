<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory,Notifiable;

    protected $guarded  =['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants(){
        return $this->hasOne(ProductVariant::class);
    }
}
