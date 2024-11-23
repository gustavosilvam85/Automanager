<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'services',
        'total_cost',
        'status',
    ];
    protected $casts = [
        'services' => 'array',
    ];
    
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function mechanic()
    {
        return $this->belongsTo(User::class, 'mechanic_id');
    }

}
