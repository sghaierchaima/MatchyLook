<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;
    protected $fillable = ['produit_id', 'commande_id', 'utilisateur_id', 'avis', 'note'];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function commande()
    {
        return $this->belongsTo(Commandde::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
    
}
