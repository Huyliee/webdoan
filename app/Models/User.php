<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='khachhang';
    protected $primaryKey ='email';
    protected $keyType ='string';
    public $incrementing = false;//Khóa chính tự động tăng -> kg cần
    public $timestamps = false;

    protected $fillable = [
        
        'email',
        'password',
        'tenkh',
        'diachi',
        'sodienthoai',
        'gioitinh',
        'ngaysinh'
        
       
    ];
    
    public function order()
    {
        return $this->hasMany(Order::class,'email','email');
    }

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
  
}
