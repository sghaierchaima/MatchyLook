<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    public function sousCategorie()
{
    return $this->belongsTo(SousCategorie::class, 'sous_categorie_id');
}
}
