<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customlists_dances extends Model
{
    use HasFactory;

    protected $fillable = ['id_customlists', 'id_dances'];

}
