<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'description',
    ];

    
    public function products()
    {
        return $this->hasMany(Product::class); 
    
    }
}
