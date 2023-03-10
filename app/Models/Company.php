<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city', 
        'zip_code',
        'siret',
        'code_ape', 
        'phone', 
        'email',
        'uuid',
        'present',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
