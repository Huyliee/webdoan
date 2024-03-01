<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        return view('admin.order.index',['data'=>Order::all()]);
    }
    
    public function order_check($id,Request $r)
    {
        $o = Order::find($r->madonhang);
        // dd($r->id_order);
        // dd($o);
        $o->status = "Chờ giao hàng";
        $o->save();
        session()->flash('messUpdate','Chấp nhận thành công');
        return redirect('/admin/order');
        
    }
    public function order_check1($id,Request $r)
    {
        $o = Order::find($r->madonhang);
        // dd($r->id_order);
        // dd($o);
        $o->status = "Đã giao hàng";
        $o->save();
        session()->flash('messUpdate','Xác nhận giao hàng thành công');
        return redirect('/admin/order');
        
    }
    public function destroy($id)
    {
        $madonhang = Order::find($id);
        $o=$madonhang->status;

        if($o == '0'){
     
            session()->flash('error','Xóa không thành công vì chưa xác nhận đơn hàng');
            return redirect('/admin/order');
      
        }
        else{
            Order::destroy($id);
            session()->flash('mess','Xóa thành đơn hàng thành công');
            return redirect('/admin/order');
        }
    }
    
}
