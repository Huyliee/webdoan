<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $table ='thuonghieu';
    protected $primaryKey ='math';
    protected $keyType ='string';
    public $incrementing = false;
    public $timestamps = false;
}
