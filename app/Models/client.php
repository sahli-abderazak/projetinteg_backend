<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $primaryKey = 'idC';

    protected $fillable = [
        'nomC',
        'prenomC',
        'dateNaissance',
        'numTelephone',
        'adresseC',
    ];
    
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'idClient', 'idC');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'idClient', 'idC');
    }
}
