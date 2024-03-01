@extends('/home/layouts/layout_user')


@section('content')
 <!-- Start Content -->
 <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Danh mục sản phẩm</h1>
                <ul class="list-unstyled templatemo-accordion">
                
                  
                        
                        <ul class="collapse show list-unstyled pl-3">
                        @foreach($arrCate as $item)
                            <li><a class="text-decoration-none" href="/home/user/danh-muc/{{$item->madanhmuc}}">{{$item->tendanhmuc}}</a></li> <hr>
                            
                        @endforeach
                        </ul>
                   
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">Tất cả</a>
                            </li>
                          
                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                        <div class="d-flex">
                            <form action="/home/user/shop">
                            Tên sản phẩm:    <input type="text" name="keyword">
                            <input type="submit" value="Tìm kiếm">
                          
                            </form>
                         
                         
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($data as $item)
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="/storage/ad/img/{{$item->hinhanh}}">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="/home/user/shop-detail/{{$item->masp}}"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="/cart/add/{{$item->masp}}"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none"><h5 class="card-title">{{$item->tensp}}</h5></a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">Giá: {{number_format($item->gia)}} VNĐ</p>
                            </div>
                        </div>
                    </div>
                   @endforeach
                 
                  
             
                   
                
                 
                    
                </div>
                <div div="row">
                    <!-- <ul class="pagination pagination-lg justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                        </li>
                    </ul> -->
                    {{$data->links()}}
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->



@stop