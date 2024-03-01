@extends('/admin/layouts/layoutadmin')



@section('content')
<style>
    .anh{
        width: 100px;
        height: 100px;
    }
</style>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản lý sản phẩm</h6>
     
    </div>
    <div class="card-body">
    @if(session()->has('error'))
             <p class="alert alert-danger">{{session()->get('error')}}</p>
        @elseif(session()->has('mess'))
        <p class="alert alert-success">{{session()->get('mess')}}</p>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã SP</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>SL </th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Hình ảnh</th>
                        <th><a href="/admin/product/create"  class="btn btn-primary"  >Thêm Sản phẩm</a>

</th>
                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Mã SP</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>SL </th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Hình ảnh</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$item->masp}}</td>
                        <td> {{$item->tensp}} </td>
                        <td>{{number_format($item->gia)}} VNĐ</td>
                        <td>{{$item->soluong}} </th>
                        <td>{{$item->cat->tendanhmuc}}</td>
                        <td>{{$item->pub->teth}}</td>
                        <td><img class="anh" id="hinhanh" src="/storage/ad/img/{{$item->hinhanh}}" alt=""></td>
                        <td>
                            <form action="/admin/product/destroy/{{$item->masp}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="masp" value="{{$item->masp}}">
                                <input type="submit" onclick="myFunction()" class="btn btn-danger" value="xoa"> 
                            </form>
                            <br>
                                <a  class="btn btn-warning"   href="/admin/product/edit/{{$item->masp}}">Sửa</a>
                        </td>
                        
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
@stop