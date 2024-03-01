<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 
    use HasFactory;
    protected $table ='sanpham';
    protected $primaryKey ='masp';
    protected $keyType ='string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'masp',
        'tensp',
        'soluong',
        'gia',
        'mota',
        'hinhanh',
        'giamgia',
        'trangthai',
        'madanhmuc',
        'math'
    ];

    public function pub()
    {
        return $this->belongsTo(Publisher::class,'math','math');

    }
    public function cat()
    {
        return $this->belongsTo(Category::class,'madanhmuc','madanhmuc');

    }
    public function anh()
    {
        return $this->hasMany(Image::class,"masp","masp");
    }
      
    public function order()
    {
        return $this->hasMany(Order_detail::class,'masp','masp');
    }


}
