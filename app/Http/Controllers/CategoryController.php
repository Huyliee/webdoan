<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Facade\FlareClient\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.category.index',['data'=>Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return View('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'madanhmuc' => 'required|unique:danhmucsanpham|max:10|min:2',
            'tendanhmuc' => 'required|unique:danhmucsanpham|min:3',

            ], 
            [
                'madanhmuc.unique'=>'Mã danh mục đã tồn tại!!',
                'madanhmuc.min'=>'Mã danh mục tối thiếu 2 kí tự!!',
                'tendanhmuc.unique'=>'Tên danh mục đã tồn tại!!!',
                'tendanhmuc.min'=>'Tên danh mục tối thiếu 3 kí tự!!',

            ]);

        $c = Category::Create($request->all());
        session()->flash('mess','Đã thêm danh muc: '. $c->madanhmuc);
        return redirect('/admin/category');
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
        $t = Category::find($id);
        return View('/admin/category/edit',['data' => $t]);
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
        $request->validate([
    
            'tendanhmuc' => 'required|unique:danhmucsanpham|min:3|max:30',

            ], 
            [
               
                'tendanhmuc.unique'=>'Tên danh mục đã tồn tại!!!',
                'tendanhmuc.min'=>'Tên danh mục tối thiếu 3 kí tự!!',
                'tendanhmuc.max'=>'Tên danh mục tối đa 30 kí tự!!',
            ]);
        $c = Category::find($request->madanhmuc);
        $c->tendanhmuc = $request->tendanhmuc;
        $c->save();
        session()->flash('mess','Sửa Danh Mục Thành Công!');
        return redirect('/admin/category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $r)
    // {
        
    //      Category::destroy($r->madanhmuc);
    //      return redirect('/admin/category');
        
    // }
    public function destroy($id)
    {
        $madanhmuc = Category::find($id)->product;
       
        if(count($madanhmuc)<=0)
        {
            Category::destroy($id);
            session()->flash('mess','Xóa Danh Mục Thành Công!');
            return redirect('/admin/category');

        }else {
            session()->flash('error','Xóa không thành công vì Danh mục có sản phẩm');
            return redirect('/admin/category');
        }
    }
}
