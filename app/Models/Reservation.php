<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $primaryKey = 'idR';

    protected $fillable = [
        'idService',
        'idClient',
        'dateReservation',
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
