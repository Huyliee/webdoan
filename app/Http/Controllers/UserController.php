<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    //
    function index(){
        return view('admin.users.index',['data'=>User::all()]);
    }
    function index_changePass()
    {
        return view('home.user.changePass');
    }
    public function profile()
    {
        return view('home.user.profile');
    }
    public function index_order()
    {
        $id = session('user')['email'];
        $order = User::find($id)->order;
        return view('home.user.profile-order',['order'=>$order]);
    }
    public function index_detail_order($id)
    {
        $dc = Order::find($id)->detail_order;
        return view('home.user.profile_order_detail',['detail_order'=>$dc,'id'=>$id ]);
    }
    function destroy($id)
    {
            $a = User::find($id)->order;
            if(count($a)<=0){
            User::destroy($id);
            session()->flash('mess','Xóa Tài Khoản Thành Công!');
            return redirect('/admin/users');
            }else{
                session()->flash('error','Xóa không thành công vì tài khoản có đơn hàng');
                return redirect('/admin/users');
            }
       
    }
    public function changePassword(Request $r)
    {
        $id = session('user')['email'];
        $c = User::find($id);
        if(!Hash::check($r->old_pass,session('user')['password']))
        {
            session()->flash('error','Mật khẩu cũ không hợp lệ');
            return redirect('/home/user/changePass');
        }
        $c->password = Hash::make($r->new_pass);
        $c->save();
        session()->flash('success','Thay đổi mật khẩu thành công');
        return redirect('/home/user/changePass');
    }
}
