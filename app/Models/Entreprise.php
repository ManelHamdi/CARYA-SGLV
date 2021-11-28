<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function employes()
    {
        return $this->hasMany(Employe::class);
    }
}
