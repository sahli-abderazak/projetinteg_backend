<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $table = 'commentaires';

    protected $primaryKey = 'idCom';

    protected $fillable = [
        'texteCom',
        'idService',
        'idClient',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'idService', 'idS');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'idClient', 'idC');
    }
}
