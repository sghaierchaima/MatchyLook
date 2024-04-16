<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategories extends Model
{
    use HasFactory;
    

    protected $fillable = ['nom', 'categorie_id'];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'categorie_id');
    } 
}
