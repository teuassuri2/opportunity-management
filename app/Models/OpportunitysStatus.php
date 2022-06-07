<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunitysStatus extends Model {

    protected $table = "opportunitys_status";
    protected $fillable = ['status', 'users_id', 'opportunitys_id',];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
