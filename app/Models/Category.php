<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function Product()
    {
        return $this->hasMany(Product::class);
    }

    protected $fillable = [
        'category_name'
    ];
}
