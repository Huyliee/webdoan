@extends('home/layouts/layout_user')
@section('style')
<style>

.ui-w-40 {
    width: 40px !important;
    height: auto;
}

.card{
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);    
}

.ui-product-color {
    display: inline-block;
    overflow: hidden;
    margin: .144em;
    width: .875rem;
    height: .875rem;
    border-radius: 10rem;
    -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    vertical-align: middle;
}
</style>
@stop
@section('content')


<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Tên sản phẩm</th>
                    <th class="text-right py-3 px-4" style="width: 180px;">Giá sản phẩm</th>
                    <th class="text-center py-3 px-4" style="width: 130px;">Số lượng</th>
                    <th class="text-center py-3 px-4" style="width: 100px; height:100px; ">Hinh Anh</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Tổng</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                  <?php $tong = 0; ?>
                </thead>
                <tbody>
                    @foreach(Cart::content() as $item)
                    @if(session('user')['name'] == $item->options->username)
                    <?php $tong += $item->qty * $item->price  ?>
                  <tr>
                    <td class="p-4">
                      <div class="media align-items-center">
                  
                        <div class="media-body">
                          {{$item->name}}
                       
                        </div>
                      </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4">{{number_format($item->price)}} VN</td>
                    <td class="align-middle p-4">{{$item->qty}} </td>
                    <td> <img style="height:100px;" src="/storage/ad/img/{{$item->options->img}}" alt=""></td>
                    <td class="text-right font-weight-semibold align-middle p-4">{{number_format($item->qty * $item->price)  }}</td>
                    <td class="text-center align-middle px-0"><a href="/cart/remove/{{$item->rowId}}" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
                  </tr>
                  @endif
                    @endforeach
                 
        
                
        
                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
              <div class="mt-4">
                <label class="text-muted font-weight-normal">Promocode</label>
                <input type="text" placeholder="ABC" class="form-control">
              </div>
              <div class="d-flex">
                <div class="text-right mt-4 mr-5">
                  <label class="text-muted font-weight-normal m-0"></label>
                  <div class="text-large"><strong></strong></div>
                </div>
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Tổng tiền</label>
                  <div class="text-large"><strong>{{number_format(  $tong)}} VND</strong></div>
                </div>
              </div>
            </div>
        
            <div class="float-right">
              <a  class="btn btn-lg btn-default md-btn-flat mt-2 mr-3" href="/home/user/shop">Tiếp tục mua hàng</a>
              @if(Cart::count()>0)
              <a class="btn btn-lg btn-primary mt-2" href="/home/user/order-detail">Thanh toán</a>
              @endif
            </div>
        
          </div>
      </div>
  </div>



@stop










