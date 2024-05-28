<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paniers extends Model
{
    use HasFactory;
    protected $fillable = ['produit_id', 'utilisateur_id', 'quantite'];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
