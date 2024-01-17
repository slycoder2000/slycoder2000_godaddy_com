<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customlists extends Model
{
    //use HasFactory;
    protected $fillable = ['id_user', 'listname'];

    public function scopeCurrentUser($query) {

        $query->where('id_user', '=' , \Auth::id())->orderby('listname');
    }

}
