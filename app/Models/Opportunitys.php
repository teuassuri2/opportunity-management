<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunitys extends Model {

    protected $table = "opportunitys";
    protected $fillable = ['title', 'description', 'users_id', 'customers_id', 'products_id',];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
