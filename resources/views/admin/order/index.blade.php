@extends('/admin/layouts/layoutadmin')


@section('content')
<div class="container-fluid">

<!-- Page Heading -->



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản lý đơn hàng</h6>
        
    </div>
    <div class="card-body">
    <h2>
                                            @if(session()->has('error'))
                                                <p class="alert alert-danger">{{session()->get('error')}}</p>
                                            @elseif(session()->has('mess'))
                                                <p class="alert alert-success">{{session()->get('mess')}}</p>
                                            @elseif(session()->has('messUpdate'))
                                                <p class="alert alert-success">{{session()->get('messUpdate')}}</p>
                                            @elseif(session()->has('messInsert'))
                                                <p class="alert alert-success">{{session()->get('messInsert')}}</p>
                                            @endif
                
                                        </h2>
   
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Email</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tên người nhận</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Mô tả</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th></th>
                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Mã đơn hàng</th>
                        <th>Email</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tên người nhận</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Mô tả</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th></th>
                       
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($data as $item)
               
                    <tr>
                        <td>{{$item->madonhang}}</td>
                        <td>{{$item->email}}</td>
                        <td> {{$item->ngaydat}} </td>
                        <td>{{$item->ten_nguoinhan}} </td>
                        <td>{{$item->sdt_nguoinhan}} </td>
                        <td>{{$item->diachi_nguoinhan}} </td>
                        <td>{{$item->mota}} </td>
                        <td>{{number_format($item->total_money)}} VNĐ</td>
                        <td>{{$item->status}}</td>
                        <td>
                            @if($item->status == 'Đã giao hàng' )
                            <form action="/admin/order/destroy/{{$item->madonhang}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="madonhang" value="{{$item->madonhang}}">
                                <input type="submit" value="xoa" class="btn btn-danger" onclick="myFunction()">
                            </form>
                            @elseif($item->status == '0')
                            <div id="action">
                                                                <form action="/admin/order/check/{{$item->madonhang}}" method="post">
                                                                    @csrf
                                                             
                                                                        <input type="hidden" name="_method" value="put">
                                                                        <input type="hidden" name="madonhang" value="{{$item->madonhang}}">
                                                                        <input type="submit" value="Xác nhận đơn hàng" class="btn btn-warning" onclick="removeColor()">
                                                                </form>
                                                              
                                                                </div> 
                            
                            @else
                            <div id="action">
                                                                <form action="/admin/order/check1/{{$item->madonhang}}" method="post">
                                                                    @csrf
                                                             
                                                                        <input type="hidden" name="_method" value="put">
                                                                        <input type="hidden" name="madonhang" value="{{$item->madonhang}}">
                                                                        <input type="submit" value="Xác nhận đã giao hàng" class="btn btn-success" onclick="removeColor()">
                                                                </form>
                                                              
                                                                </div> 
                            @endif                  
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
<script>
//             function removeClass() {
//   let status = document.getElementById('status');
//   /* xoá class  title*/
// //   element.classList.remove('title');
// }
// removeClass();
function removeColor(){
let status = document.getElementById('status');
status.classList.remove('btn-danger');
}
// status.classList.add('btn-success');

        </script>
@stop