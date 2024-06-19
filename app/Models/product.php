<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'image',
        'description',
        'category_id',
        'size',
        'color'
    ];

    public function category(){

        return $this->belongsTo(category::class);
    }
}
