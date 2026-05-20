<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    use HasFactory;
    protected $table = 'product_variants';
    protected $fillable = [
        'product_id',
        'cau_hinh_id',
        'mau_sac_id',
        'so_luong',
        'hinh_anh',
        'gia_dieu_chinh',
        'luot_xem',
    ];
}
