@extends('/admin/layouts/layoutadmin')


@section('content')
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm Danh Mục</h6>
       
    </div>
    <div class="card-body">
        @if(session()->has('error'))
             <p class="alert alert-danger">{{session()->get('error')}}</p>
        @elseif(session()->has('mess'))
        <p class="alert alert-success">{{session()->get('mess')}}</p>
        @endif
        <div class="modal-body">
      <form action="/admin/category/store" method="POST">
    @csrf
<table align="center">
        <tr>
            <td colspan="2">Mã danh mục</td>
            <td colspan="2"><input type="text" name="madanhmuc" require value="{{old('madanhmuc')}}"></td>
            @error('madanhmuc')
            <td><div class="alert alert-danger"> {{$message}}    </div></td>
            @enderror
        </tr>
        <tr>
            <td colspan="2">Tên danh mục</td>
            <td colspan="2"><input type="text" name="tendanhmuc" value="{{old('tendanhmuc')}}"></td>
            @error('tendanhmuc')
            <td><div class="alert alert-danger"> {{$message}}    </div></td>
            @enderror
        </tr>
        <tr>
            
          
           <td></td>
           
           
           <td colspan="2" > <input type="submit" value="Lưu" class="btn btn-outline-success" >
          
            </td>
            <td><a type="button" class="btn btn-outline-danger" href="/admin/category" data-dismiss="modal">Đóng</a></td>
        </tr>
    </table>
</form>
            
      
        
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
@stop