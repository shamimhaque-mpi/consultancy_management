<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'service_id', 'tax_id', 'date', 'status', 'trash', 'designation','name','common','address','postal_code','telephone','email','ordinary_or_standard_isee','isee_universita','isee_for_minors','isee_socio_sanitario','current_isee','household','house_rent_property_other'];


    // RELATION WITH CUSTOMER
    public function customer(){
    	return $this->hasOne(Customer::class, 'tax_id', 'tax_id');
    }

    // RELATION WITH SERVICE
    public function service(){
    	return $this->hasOne(Service::class, 'id', 'service_id');
    }

    // RELATION WITH SERVICE
    public function comments(){
        return $this->hasMany(Comment::class, 'file_id', 'id');
    }

    // RELATION WITH SERVICE
    public function attachments(){
        return $this->hasMany(Attachment::class, 'file_id', 'id');
    }

    // RELATION WITH USER
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
