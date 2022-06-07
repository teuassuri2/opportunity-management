<?php namespace App\Models;use Illuminate\Database\Eloquent\Factories\HasFactory;use Illuminate\Database\Eloquent\Model;class Customers  extends Model{
    
            protected $table = "customers";


        protected $fillable = ['name', 'document', ];protected $dates = [
'created_at',
 'updated_at',
];
}