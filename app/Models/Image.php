<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table ='hinhanh';
    protected $primaryKey ='id';
    protected $keyType ='string';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        
        'img',
        'masp'
        
       
    ];
}
