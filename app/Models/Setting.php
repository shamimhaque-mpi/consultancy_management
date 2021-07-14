<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['company_name', 'company_mobile', 'company_email', 'company_address', 'logo', 'fav_icon'];
}
