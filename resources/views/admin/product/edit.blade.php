@extends('/admin/layouts/layoutadmin')


@section('content')
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm Sản phẩm</h6>
       
    </div>
    <div class="card-body">
        @if(session()->has('error'))
             <p class="alert alert-danger">{{session()->get('error')}}</p>
        @elseif(session()->has('mess'))
        <p class="alert alert-success">{{session()->get('mess')}}</p>
        @endif
        <div class="modal-body">
        <form action="/admin/product/edit/{$id}" method="POST"  enctype="multipart/form-data">
    @csrf
<table align="center">
        <tr>
            <td colspan="2">Mã sản phẩm</td>
            <td colspan="2"><input type="text" readonly name="masp" value="{{$data->masp}}"></td>
            @error('masp')
            <td><div class="alert alert-danger"> {{$message}}    </div></td>
            @enderror
            
        </tr>
        <tr>
            <td colspan="2">Tên sản phẩm</td>
            <td colspan="2"><input type="text" name="tensp" value="{{$data->tensp}}"></td>
            @error('tensp')
            <td><div class="alert alert-danger"> {{$message}}    </div></td>
            @enderror
            
        </tr>
        <tr>
            <td colspan="2">Số lượng</td>
            <td colspan="2"><input type="number" name="soluong" value="{{$data->soluong}}"></td>
            
        </tr>
        <tr>
            <td colspan="2">Giá</td>
            <td colspan="2"><input type="number" name="gia" value="{{$data->gia}}" ></td>
            
        </tr>
        <tr>
            <td colspan="2">Mô tả</td>
            <td colspan="2"><textarea type="text" id="mota" name="mota"> {{$data->mota}}</textarea>

            
            <script>
                CKEDITOR.replace('mota');
            </script>
            </td>
            
        </tr>
        <tr>
            <td colspan="2">Hình ảnh</td>
            <td colspan="2"><input type="file" name="hinhanh"   > hình ảnh hiện tại: {{$data->hinhanh}}</td>
        </tr>
        <tr>
            <td colspan="2">Trạng thái</td>
            <td colspan="2">
                <select name="trangthai" class="form-select" >
                    <option value="1">Còn hàng</option>
                    <option value="0" >Hết hàng</option>
                </select>
            </td>
       
            
        </tr>
        <tr>
            <td colspan="2"  >Danh mục</td>
            <td colspan="2">
                <select name="madanhmuc" class="form-select">
                <option value="{{$data->madanhmuc}}" selected >{{$data->cat->tendanhmuc}} </option>
                   @foreach($ct as $item)
                    <option value="{{$item->madanhmuc}}">{{$item->tendanhmuc}}</option>
                    @endforeach
                </select>
            </td>
       
            
        </tr>
        <tr>
            <td colspan="2">Thương hiệu</td>
            <td colspan="2" >
                <select  name="math" class="form-select">
                <option value="{{$data->math}}" selected >{{$data->pub->teth}} </option>
                @foreach($th as $item)
            
                    <option value="{{$item->math}} " >{{$item->teth}}</option>
                    @endforeach
                </select>
            </td>
       
            
        </tr>
        <tr>
            
          
           <td></td>
           
           
           <td colspan="2" > <input type="submit" value="Lưu" class="btn btn-outline-success" >
           <input type="hidden" name="_method" value="put">
            </td>
            <td><button type="button" class="btn btn-outline-danger" data-dismiss="modal">Đóng</button></td>
        </tr>
    </table>
</form>
            
      
        
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
@stop