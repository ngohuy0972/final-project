<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'order_id',
        'name',
        'phone_number',
        'email',
        'address',
        'city',
        'zip',
        'order_note'
    ];
}
