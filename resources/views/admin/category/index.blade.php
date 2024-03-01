@extends('/admin/layouts/layoutadmin')


@section('content')
<div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản lý danh mục</h6>
       
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
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <!-- <th>         <button><a href="/admin/category/create"> Them Danh Muc</a></button></th> -->
                        <th><a  href="/admin/category/create" class="btn btn-primary"   >Thêm Danh Mục Mới</a></th>
 
                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th></th>
                        <th></th>
                       
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($arrCate as $index=>$item)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$item->madanhmuc}}</td>
                        <td> {{$item->tendanhmuc}} </td>
                        <td>
                            <form  action="/admin/category/destroy/{{$item->madanhmuc}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="madanhmuc" value="{{$item->madanhmuc}}">
                                <input type="submit" onclick="myFunction()" value="Xóa"  class="btn btn-danger">
                            </form> <br>
                            <a  class="btn btn-primary"   href="/admin/category/edit/{{$item->madanhmuc}}">Sửa</a>
 
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