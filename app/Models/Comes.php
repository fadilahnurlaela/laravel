<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comes extends Model
{
    use HasFactory;
    public function comes()
    {
        return $this->belongsTo('App\Models\Book', 'nama', 'id');
    }
}
