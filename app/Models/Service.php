<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $primaryKey = 'idS';

    protected $fillable = [
        'nomS',
        'categorieS',
        'critereS',
        'idP',
        'imgS',
    ];

    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class, 'idP', 'idP');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'idService', 'idS');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'idService', 'idS');
    }
}
