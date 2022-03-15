<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class products extends Model
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'category',
        'discountprice',
        'instock',
        'priority',
        'quantity',
        'img'
    ];
}
