<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'cpf',
        'email',
        'address',
        'city',
        'state',
        'zip_code',
        'phone1',
        'phone2',
        'mechanical_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mechanicalWorkshop()
    {
        return $this->belongsTo(MechanicalWorkshop::class, 'mechanical_id');
    }
    
    public function cars()
    {
        return $this->hasMany(Car::class, 'client_id');
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class, 'client_id');
    }
}
