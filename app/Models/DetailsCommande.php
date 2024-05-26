<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsCommande extends Model
{
    use HasFactory;
    protected $fillable = ['commandde_id', 'produit_id', 'quantite', 'prix_unitaire', 'total'];
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function commandde()
    {
        return $this->belongsTo(Commandde::class);
    }
}
