<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MechanicalWorkshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'cnpj',
        'corporate_name',
        'owner',
        'address',
        'city',
        'state',
        'zip_code',
        'phone1',
        'phone2',
        'email',  // Incluído o campo 'email'
        'password',  // Incluído o campo 'password'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class, 'mechanical_id');
    }
}
