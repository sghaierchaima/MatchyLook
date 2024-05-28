<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public function paniers()
    {
        return $this->hasMany(Panier::class);
    }
   
}
