<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index()
    {
        return View('admin.index');
    }
    function danhmuc($madanhmuc)
    {
        $data = Product::where('madanhmuc', $madanhmuc) -> paginate(6);
        $pub = Product::find($madanhmuc);
        return view('home.user.danhmuc',['data'=>$data,'tendanhmuc'=>'Sản phẩm theo danh mục']);
    }
    function sanpham($masp)
    {
        $data = Product::where('masp',$masp) ->get();
        $img = Image::find($masp);
        return view('home.user.shop-detail',['data'=>$data]);
    }
    function about()
    {
        return view('home.user.about');
    }
    function contact()
    {
        return view('home.user.contact');
    }
    function createImg()
    {
        
        return view('admin.product.createImg');
    }
    function store(Request $request)
    {
        $data = $request ->all();
    
        $fileName = $request->img-> getClientOriginalName();
        $request->img->storeAs('public/ad/img',$fileName);
        $data['hinhanh']=$fileName;
        Image::Create($data);
        $request->img->storeAs('ad/img',$fileName);
        session()->flash('messInsert','Thêm thành công');
        return redirect('/admin/product');  
    }
}
