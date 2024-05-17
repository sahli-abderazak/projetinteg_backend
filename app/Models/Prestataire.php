<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    use HasFactory;

    protected $table = 'prestataires';

    protected $primaryKey = 'idP';

    protected $fillable = [
        'nomP',
        'prenomP',
        'secteur',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'idP', 'idP');
    }
}
