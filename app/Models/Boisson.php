<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boisson extends Model
{
    protected $fillable = ['id', 'nom_boisson', 'prix'];
}
