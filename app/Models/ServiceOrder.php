<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $table = 'service_orders'; 

    protected $fillable = [
        'budget_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }
}
