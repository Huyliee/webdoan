<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use App\Models\Publisher;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexuser()
    {
        //
        return View('home.user.shop',['data'=>Product::paginate(6)]);
    }

    public function index()
    {
        return View('admin.product.index',['data'=>Product::all(),'th'=>Publisher::all(),'ct'=>Category::all()]);
    }
    function timkiem(Request $r)
    {
        $kw = $r -> keyword;
        $data = Product::where('tensp','like',"%$kw%") -> paginate(6)->withQueryString();
      
        return view('home.user.shop',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.product.create',['data'=>Product::all(),'th'=>Publisher::all(),'ct'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
                'masp' => 'required|unique:sanpham|min:1|max:10',
                'tensp' => 'required|unique:sanpham|min:3|max:50',
                'gia' => 'required',
                'soluong' => 'required'
                
        ],
        [
            'masp.unique' => 'Mã sản phẩm đã tồn tại',
            'ten.unique' => 'Tên sản phẩm đã tồn tại',
            'masp.required' => 'Vui lòng nhập mã!' ,
            'tensp.required' => 'Vui lòng nhập tên sản phẩm!',
            'masp.min' => 'mã sản phẩm tối thiểu 2 kí tự',
            'gia.required' => 'Vui lòng nhập giá sản phẩm!',
            'soluong.required' => 'Vui lòng nhập số lượng sản phẩm!',
            'tensp.required' => 'Vui lòng nhập tên sản phẩm!',
        ]
    
    
    );
        $data = $request ->all();
    
        $fileName = $request -> hinhanh -> getClientOriginalName();
        $request->hinhanh->storeAs('public/ad/img',$fileName);
        $data['hinhanh']=$fileName;
        Product::Create($data);
        $request->hinhanh->storeAs('ad/img',$fileName);
        session()->flash('messInsert','Thêm thành công');
        return redirect('/admin/product');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $t = Product::find($id);
        return View('/admin/product/edit',['data' => $t ,'th'=>Publisher::all(),'ct'=>Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $c = Product::find($request->masp);
        $c->tensp = $request->tensp;
        $c->soluong = $request->soluong;
        $c->gia = $request->gia;
        $c->mota=$request->mota;
        
        $c->save();
        session()->flash('mess','Sửa Sản phẩm Thành Công!');
        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $o = Product::find($id)->order;
        //$o = Order_detail::find($id)->order;
       
        if(count($o)<=0)
        {
        Product::destroy($id);
        session()->flash('mess','Xóa thành công');
        return redirect('/admin/product');
        }
        else {
            session()->flash('mess','Xoa khong thanh cong');
            return redirect('/admin/product');
        }

    }
}
