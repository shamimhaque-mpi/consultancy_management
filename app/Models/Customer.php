<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['customer_name', 'tax_id', 'type', 'telephone', 'mobile', 'place_of_birth', 'citizenship', 'address_line_one', 'address_line_two', 'city', 'region', 'postcode', 'date_of_birth', 'company_name', 'first_name', 'last_name', 'user_id', 'trash'];
}
