<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function phone()
    {
        return $this->belongsTo(Category::class, 'foreign_key');
    }
}
