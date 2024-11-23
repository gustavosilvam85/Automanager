<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'manufacture_year',
        'model_year',
        'plate',
        'color',
        'fuel_type',
        'notes',
        'client_id', // Relacionado ao cliente
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
