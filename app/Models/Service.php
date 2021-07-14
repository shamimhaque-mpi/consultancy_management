<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['service_name','service_fee', 'cat_id','trash'];


    public function category(){
    	return $this->hasOne(Category::class, 'id', 'cat_id');
    }
}
