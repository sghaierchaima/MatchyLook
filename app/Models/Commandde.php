<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandde extends Model
{
    protected $fillable = [
        'utilisateur_id',
        'adresse_livraison',
        'telephone',
        'mode_paiement',
        'methode_livraison',
        'etat'
    ];
    const STATUS_PROCESSING = 'en_traitement';
    const STATUS_DELIVERED = 'livrée';
    use HasFactory;
    public function detailsCommande()
    {
        return $this->hasMany(DetailsCommande::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
    
}
