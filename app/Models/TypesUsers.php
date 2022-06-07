<?php namespace App\Models;use Illuminate\Database\Eloquent\Factories\HasFactory;use Illuminate\Database\Eloquent\Model;class TypesUsers  extends Model{
    
            protected $table = "types_users";


        protected $fillable = ['name', ];protected $dates = [
'created_at',
 'updated_at',
];
}