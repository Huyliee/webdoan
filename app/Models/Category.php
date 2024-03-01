<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;
    protected $table ='danhmucsanpham';
    protected $primaryKey ='madanhmuc';
    protected $keyType ='string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'madanhmuc',
        'tendanhmuc'
    ];
    public function product()
    {
        return $this->hasMany(Product::class,"madanhmuc","madanhmuc");
    }

}
