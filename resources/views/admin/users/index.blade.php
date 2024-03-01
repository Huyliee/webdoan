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
        <h5><a href="/admin/category/create"> Them moi</a></h5>
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
                        <th>Email</th>
                        <th>Ten Khach Hang</th>
                        <th>Dia chi</th>
                        <th>gioi tinh</th>
                        <th>So dien thoai</th>
                        <th>Ngay sinh</th>
                        <th></th>
                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>STT</th>
                        <th>Email</th>
                        <th>Ten Khach Hang</th>
                        <th>Dia chi</th>
                        <th>gioi tinh</th>
                        <th>So dien thoai</th>
                        <th>Ngay sinh</th>
                        <th></th>
                       
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($data as $index=>$item)
               
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$item->email}}</td>
                        <td> {{$item->tenkh}} </td>
                        <td>{{$item->diachi}} </td>
                        <td>{{$item->gioitinh}} </td>
                        <td>{{$item->sodienthoai}} </td>
                        <td>{{$item->ngaysinh}} </td>
                        <td>
                            <form action="/admin/users/destroy/{{$item->email}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="email" value="{{$item->email}}">
                                <input type="submit" value="xoa" onclick="myFunction()" class="btn btn-danger">
                            </form>
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