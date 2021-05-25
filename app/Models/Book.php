<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->belongsTo('App\Models\Categories', 'categories', 'id');
    }
    public function brands()
    {
        return $this->belongsTo('App\Models\Brands', 'brands', 'id');
    }
}
