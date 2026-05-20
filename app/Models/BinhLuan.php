<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;
    protected $table = 'binh_luans';
    protected $fillable = [
        'user_id',
        'product_id',
        'ratting',
        'content',
        'trang_thai',
    ];
}
