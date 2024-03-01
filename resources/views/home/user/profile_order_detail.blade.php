@extends('/home/layouts/layout_user')
@section('content')
<style>
.heading,
.row {
    border-bottom: 1px solid #dddddd;
    padding: 10px;
}

.wrapper.p-4,
.col-md-9.col-12.right.ps-md-4 {
    border: 2px solid #dddddd;
    border-radius: 10px;
}

.heading {
    width: 100%;
    margin-bottom: 10px;
}

/* .form-control{
    width:500px;
} */
</style>
<div class="profile">
    <div class="container">
        <div class="row py-4">


            <div class="col-md-3 col-12 left">
                <div class="wrapper p-4">
                    <div class="info d-flex align-items-center mb-md-3">
                        <div class="image me-3">
                            <a href="#">
                            <img style="width: 100px;" src="https://haycafe.vn/wp-content/uploads/2021/11/Anh-avatar-dep-chat-lam-hinh-dai-dien.jpg "
                                    class="rounded-circle" />
                            </a>
                        </div>
                        <div class="info-wrapper">
                            <div>
                                <h5 class="fw-bold">{{session()->get('user')['name']}}</h5>
                                <small><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="016968647436353433323241666c60686d2f626e6c">[email&#160;protected]</a></small>
                            </div>
                            <span id="toggle-profile-menu" class="d-lg-none">
                                <i class="icon icon--chevron-down"></i>
                            </span>
                        </div>
                    </div>
                    <nav class="profile-links py-3">
                        <ul class="list-unstyled mb-0 py-3 pt-md-1">
                            <li class="mb-1">
                                <a class="
                          d-inline-flex
                          align-items-center
                          rounded
                          collapsed
                        " data-bs-toggle="collapse" data-bs-target="#getting-started-collapse" aria-expanded="false">
                                    <h6 class="fw-bold">Tài khoản</h6>
                                </a>
                                <div class="collapse show" id="getting-started-collapse">
                                    <ul class="list-unstyled fw-normal pb-1 small">
                                        <li>
                                            <a href="/home/user/profile" class="d-inline-flex
                                align-items-center
                                rounded
                                active
                              ">
                                                Thông tin cá nhân
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/user/profile/changePassword"
                                                class="d-inline-flex align-items-center rounded  ">
                                                Đổi mật khẩu
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mb-1">
                                <a class="d-inline-flex align-items-center rounded  " href="/home/user/profile-order">
                                    <h6 class="fw-bold">Đơn đặt hàng</h6>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a class="d-inline-flex align-items-center rounded  " href="#">
                                    <h6 class="fw-bold">Đánh giá của Quý khách</h6>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-9 col-12 right ps-md-4">
                <div class="wrapper p-md-4">
                    <div class="heading">
                        <h5 class="fw-bold">Danh sách sản phẩm </h5>
                        <p class="text-muted mb-4">
                            Danh sách các sản phẩm quý khách đã đặt
                        </p>
                    </div>
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Mã sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                       
                            @foreach($detail_order as $items)
                                <tr>
                                 
            
                                    <th scope="row">{{$items->madonhang}}</th>
                                
                                    <td>{{$items->masp}}</td>
                                    <td>{{$items->soluong}}</td>
                                    <td>{{$items->$hinh}}</td>
                                    <td>{{$items->total_money}}</td>
                              
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection