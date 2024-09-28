<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'thumbnail',
        'about'
    ];

    public function getImageAttributes($value)
    {
        if ($value != null) {
            return asset('storage/products/' . $value);
        } else {
            return 'https://fakeimg.pl/308x205/?text=Product&font=lexend';
        }
    }
}
