<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    public function sousCategorie()
{
    return $this->belongsTo(SousCategories::class, 'sous_categorie_id');
}

public function category()
{
    return $this->belongsTo(Categories::class, 'categorie_id'); // Utiliser la clé étrangère 'categorie_id' pour la relation avec la catégorie
} 
public function paniers()
{
    return $this->hasMany(Panier::class);
}
}
