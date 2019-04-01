<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Site extends Model 
{
    protected $fillable = [
        'name',
        'title',
        'description',
        'pathImage',
        'gitPath', 
        'sitePath',
        'final',
         'created_at',
         'update_at'

    ];
}
