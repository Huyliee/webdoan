@extends('/home/layouts/layout_user')


@section('content')



<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Chi tiết đơn hàng</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 100px;">STT</th>
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Tên sản phẩm</th>
                    <th class="text-center py-3 px-4" style="width: 130px;">Số lượng</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Tổng</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                  <?php $tong = 0;
                  $i=0 ?>
                </thead>
                <tbody>
                    @foreach(Cart::content() as $item)
                    @if(session('user')['name'] == $item->options->username)
                    <?php $tong += $item->qty * $item->price ;
                    $i++ ?>
                  <tr>
                    <td>{{$i}}</td>
                    <td class="p-4">
                      <div class="media align-items-center">
                  
                        <div class="media-body">
                          {{$item->name}}
                       
                        </div>
                      </div>
                    </td>
           
                    <td class="align-middle p-4">{{$item->qty}} </td>
                    <td class="text-right font-weight-semibold align-middle p-4" >{{number_format($item->qty * $item->price)  }}</td>
                    <td></td>
                  </tr>
                  @endif
                    @endforeach
                 
        
                
        
                </tbody>
              </table>
              
            </div>
            <!-- / Shopping cart table -->
            <table>
        <form action="/home/user/order-detail" method="POST">
       @csrf
       <tr>
        <td>Tên người nhận: <br> <input type="text" name="ten_nguoinhan" value="{{session('user')['name']}}"></td>
       </tr>
       <tr>
      <td>Địa chỉ người nhận: <br> <input type="text" name="diachi_nguoinhan" value="{{session('user')['diachi']}}"> <br></td>
       </tr>
      
        <tr>
          <td> Điện thoại: <br> <input type="text" name="sdt_nguoinhan" value="{{session('user')['sdt']}}"> <br></td>
        </tr>
       <tr>
        <td>Email: <br> <input type="text" name="email" value="{{session('user')['email']}}"></td>
       </tr>
       <tr>
        <td>Ghi chú: <br> <input type="text" name="mota" > </input>
       </tr>
        
        
            <div class="right flex-wrap justify-content-between align-items-center pb-4">
             
              <div class="right">
                <div class="text-right mt-4 mr-5">
                  <label class="text-muted font-weight-normal m-0"></label>
                  <div class="text-large"><strong></strong></div>
                </div>
                <div class="text-right mt-4" >
                  <label class="text-muted font-weight-normal m-0">Tổng tiền</label>
                  <div class="text-large"><strong>  {{number_format($tong)}} VND</strong></div>
               
                  
            <div class="float-right">
            Các hình thức thanh toán. <br>
           <input type="submit" class="btn btn-lg btn-primary mt-2" value="Thanh toán khi nhận hàng" >
           
         </div>

                </div>
              </div>
            </div>
        </form> 
        <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                action="/home/user/chekout/vnpay">
                @csrf
                <input type="hidden" name="ten_nguoinhan" value="{{session('user')['name']}}"/>
                <input type="hidden" name="diachi_nguoinhan" value="{{session('user')['diachi']}}"> 
                <input type="hidden" name="sdt_nguoinhan" value="{{session('user')['sdt']}}">
                <input type="hidden" name="email" value="{{session('user')['email']}}">
        
                <input type="hidden" name="madonhang" value="$data['madonhang']">
                <input type="hidden" name="total_price" value='{{$tong}}'>
                <input type="submit" name="redirect" id="redirect" value="Thanh toán PayVN">
            </form>
     
            </table>
          </div>
      </div>
  </div>



@stop