<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Cart;
use App\Models\Order;
use App\Models\Order_detail;
use Dflydev\DotAccessData\Data;

class CartController extends Controller
{
    //
    function add($id,Request $r)
    {
        // Cart::add('293ad','Product 1', 1 ,9.99,550, ['size'=>'large']);
        // dd(Cart::content());
        $s = Product::find($id);
       // dd($s);
       $a =['id'=>$s->masp,
            'name'=>$s->tensp,
            'qty' => $r->quantity,
            'price' =>$s->gia,
            'weight' => 0,
            'options' => ['username' => session('user')['name'],'img'=>$s->hinhanh]
          

    ];
        Cart::add($a);
        return redirect('/cart');

        
    }
    function addd($id)
    {
        // Cart::add('293ad','Product 1', 1 ,9.99,550, ['size'=>'large']);
        // dd(Cart::content());
        $s = Product::find($id);
       // dd($s);
       $a =['id'=>$s->masp,
            'name'=>$s->tensp,  
            'qty' => 1,
            'price' =>$s->gia,
            'weight' => 0,
            'options' => ['username' => session('user')['name'],'img'=>$s->hinhanh]
          

    ];
        Cart::add($a);
        return redirect('/cart');

        
    }
    function index()
    {
        return View('Cart');
    }
    function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect('/cart');
    }
    function user_checkout()
    {
        // if(!session()->has('user'))
        // {
        //     session()->flash('error','Dang nhap de mua hang');
        //     return redirect('/home/user/login');
        // }else{
            return view('/home/user/order-detail');
        //}
    }
    function user_checkout1(Request $r)
    {
        $data = $r->all();
        $data['ngaydat']=date('y-m-d h:i:s');
        $data['madonhang']= time();
        $data['status']=0;
        $data['email']=session('user')['email'];
        foreach(Cart::content() as $item)
        {
            $data['total_money']=$item->price*$item->qty;
        }
        $o = Order::create($data);
        $madonhang= $o->madonhang;
        foreach(Cart::content() as $item)
        {
            $data2=['madonhang'=>$madonhang,
                    'masp'=>$item->id,
                    'soluong'=>$item->qty,
                    'total_money'=>$item->price*$item->qty
                    ];
                    Order_detail::create($data2);
        }


        //xoa gio hang
        Cart::destroy();
        return redirect('/home/user/finish');
    }
    function finish()
    {
        return view('home.user.finish');
    }
}
