<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Cart;
use Hash;
class LoginController extends Controller
{
    //
    function index(){
        return View('login');
    }
    //lay data tu form de xu ly
    function login(Request $r)
    {
        
        $u = Admin::find($r->username);
    
        if($u)
        {
            if(Hash::check($r->password,$u->password))
            {
               
                session()->put('admin',['username'=>$u->username,'name'=>$u->name]);
            return redirect('/admin');
            } else 
                session()->flash('error','Mật khẩu không hợp lệ!');
                return redirect('/login');
            
        } else
            session()->flash('error','Thông tin không hợp lệ!');
            return redirect('/login');
        
    }
    function logout()
    {
        session()->forget(['dangnhap','admin']);
        return redirect('/login');
    }
    // ----------------------------------------------
    function user_login()
    {
        return View('home.user.login');
    }
    function user_login1(Request $r)
    {
   
        $u = User::find($r->email);
        if($u)
        {
        
            if(Hash::check($r->password,$u->password))
            {
                session(['user'=>[
                    'email' => $u->email,
                    'name' => $u->tenkh,
                    'diachi' => $u->diachi,
                    'sdt' => $u->sodienthoai,
                    'gioitinh' => $u->gioitinh,
                    'ngaysinh' =>$u->ngaysinh,
                    'password' => $u ->password
                   
                    

                ]]);
                //session()->put('thongtin',['email'=>$u->email,'name'=>$u->name]);
                return redirect('/');
            } else 
                session()->flash('error','Mật khẩu không hợp lệ!');
             
            
        } else
            session()->flash('error','Email không đúng');
            return redirect('/home/user/login');
        
    }
    function user_logout()
    {
        session()->forget(['dangnhap','user']);
      
        return redirect('/');
    }
    function register()
    {
        return view('home.user.register');
    }
    function registeruser(Request $r)
    {
        if (User::where('email', $r->email)->first()) {
            session()->flash('error', 'Email đã tồn tại');
            return redirect('/home/user/register');
        } else {
            if ($r->password == $r->confirmpassword) {
                User::Create([
                    'tenkh'=>$r->tenkh,
                    'email' => $r->email,
                    'password' => Hash::make($r->password),
                    'diachi'=> $r->diachi,
                    'sodienthoai'=>$r->sodienthoai,
                    'gioitinh' =>$r->gioitinh,
                    'ngaysinh' =>$r->ngaysinh

                ]);
                session()->flash('error', 'Tạo tài khoản thành công');
                return redirect('/home/user/login');
            } else {
                session()->flash('error', 'xác nhận mật khẩu thất bại');
                return redirect('/home/user/register');
            }
        }
    }
    
}
