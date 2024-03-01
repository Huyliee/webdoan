@extends('home/layouts/layout_user')


@section('content')
     <!-- Start Banner Hero -->
     <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="/home/img/banner1.png" alt="Responsive image">
                        </div>
                
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="/home/img/banner2.png" alt="Responsive image">
                        </div>
                   
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="/home/img/banner3.jpg" alt="Responsive image">
                        </div>
               
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Danh mục Sản Phẩm</h1>
                <p>
                 ********************
                </p>
            </div>
     
        </div>
        <div class="row">
            @foreach($arrCate as $item)
            <div class="col-12 col-md-3 p-5 mt-3">
                <a href="/client/findbyid/{{$item->madanhmuc}}"><img src="" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">{{$item->tendanhmuc}}</h5>
                <p class="text-center"><a href="/client/findbyid/{{$item->madanhmuc}}" class="btn btn-success">Mua</a></p>
            </div>
   
            @endforeach
        </div>
    </section>
    <!-- End Categories of The Month -->
    

    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Tin tức nổi bật</h1>
                    <p>
                        Các tin tức nổi bật của Shop
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="https://sieupet.com/sites/default/files/pictures/images/thuc-an-kho-cho-cho.gif" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                           
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">Thức ăn cho chó trưởng thành mọi giống Equilibrio All Breed Adult</a>
                            <p class="card-text">
                                Các sản phẩm của EQUILIBRIO được sản xuất tại Brazil và tuân thủ theo những quy trình nghiêm ngặt nhất,
                                 đảm bảo không sử dụng nguyên liệu biến đổi gen nhờ quá trình lựa chọn hết sức chặt chẽ.
                                  Bạn có thể yên tâm rằng thú cưng của mình đang được thưởng thức loại thức ăn an toàn nhất.
                            </p>
                            <p class="text-muted">Reviews (24)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="https://bizweb.dktcdn.net/100/229/172/products/ch-i-3-t-ng-u-m-o-1-min.jpg?v=1533086153533" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                         
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">Cloud Nike Shoes</a>
                            <p class="card-text">
                                Aenean gravida dignissim finibus. Nullam ipsum diam, posuere vitae pharetra sed, commodo ullamcorper.
                            </p>
                            <p class="text-muted">Reviews (48)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="https://mypet.vn/wp-content/uploads/2021/07/thu-cung.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                    
                            
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">Summer Addides Shoes</a>
                            <p class="card-text">
                                Curabitur ac mi sit amet diam luctus porta. Phasellus pulvinar sagittis diam, et scelerisque ipsum lobortis nec.
                            </p>
                            <p class="text-muted">Reviews (74)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

    

@stop
