<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Product extends Model
{
   
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'prod_image',
        'price' ,
        'MRP' ,
        'our_price'       
    ];
}
