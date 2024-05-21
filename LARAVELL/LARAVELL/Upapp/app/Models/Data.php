<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name', 'last_name', 'email', 'gender', 'ip_address', 'date', 'car', 'car_vin', 'car_year'
    ];
}
