<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderShip extends Controller
{
    //
    function demo1()
    {
        Mail::to('huyln.hbt.9a3@gmail.com')->send(new SendMail());
        return redirect('/home/user/shop');
    }
}
