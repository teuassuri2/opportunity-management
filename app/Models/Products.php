<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model {

    protected $table = "products";
    protected $fillable = ['name',];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    
    public function Opportunitys()
    {
        return $this->hasMany(Opportunitys::class, 'products_id', 'id');
    }

}
