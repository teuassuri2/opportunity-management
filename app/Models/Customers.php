<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Opportunitys;
class Customers extends Model {

    protected $table = "customers";
    protected $fillable = ['name', 'document',];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    
    public function Opportunitys()
    {
        return $this->hasMany(Opportunitys::class, 'customers_id', 'id');
    }

}
