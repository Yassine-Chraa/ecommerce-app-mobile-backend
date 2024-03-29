<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_Item extends Model
{
  use HasFactory;
  protected $fillable = [
    'user_name',
    'product_id',
    'quantity',
  ];
}
