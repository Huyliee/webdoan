<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='dondathang';
    protected $primaryKey='madonhang';
    protected $keyType='string';
    public $incrementing = false;
    public $timestamps =false;
    protected $fillable=['madonhang','email','ngaydat','ten_nguoinhan',
    'sdt_nguoinhan','diachi_nguoinhan','mota','total_money' ,'status'];
    public function detail_order()
    {
        return $this->hasMany(Order_Detail::class,"madonhang","madonhang");
    }
}
