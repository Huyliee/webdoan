@extends('/admin/layouts/layoutadmin')


@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
       
    </div>
    <div class="card-body">
        @if(session()->has('error'))
             <p class="alert alert-danger">{{session()->get('error')}}</p>
        @elseif(session()->has('mess'))
        <p class="alert alert-success">{{session()->get('mess')}}</p>
        @endif
        <div class="modal-body">
      <form action="/admin/category/edit/{id}" method="POST">
    @csrf
<table>
        <tr>
            <td colspan="2">Mã danh mục</td>
            <td colspan="2"><input type="text" readonly name="madanhmuc" require value="{{$data->madanhmuc}}"></td>
            @error('madanhmuc')
            <td><div class="alert alert-danger"> {{$message}}    </div></td>
            @enderror
        </tr>
        <tr>
            <td colspan="2">Tên danh mục</td>
            <td colspan="2"><input type="text" name="tendanhmuc" value="{{$data->tendanhmuc}}"></td>
            @error('tendanhmuc')
            <td><div class="alert alert-danger"> {{$message}}    </div></td>
            @enderror
        </tr>
        <tr>
            
          
           <td></td>
           
           
           <td colspan="2" > <input type="submit" value="Lưu" class="btn btn-outline-success" >
           <input type="hidden" name="_method" value="put">
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