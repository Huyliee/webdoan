<!doctype html>
<html lang="en">
  <head>
    <title>Trang Đăng ký</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        
    .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
</style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  </head>
  <body>
<h2>
        @if(session()->has('error'))
        {{session()->get('error')}}
        @endif
    </h2>
  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="/home/user/register" method="POST" style="height: 1000px;">
        @csrf
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                <h2>Đăng kí</h2>
          </div>

          <div class="divider d-flex align-items-center my-4">
      
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Họ & Tên</label>
            <input type="text" id="form3Example3" require  name="tenkh" class="form-control form-control-lg"
              />
            
          </div>
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Địa chỉ</label>
            <textarea  type="textarea" id="form3Example3"  name="diachi" class="form-control form-control-lg"
            ></textarea>
            <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Số điện thoại</label>
            <input type="number" id="form3Example3"  name="sodienthoai" class="form-control form-control-lg"
             />
             <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Giới tính</label>
            <select name="gioitinh" class="form-control form-control-lg" id="form3Example3">
              <option value="Nữ" selected>Nữ</option>
              <option value="Nam">Nam</option>
            </select>
            
          </div>
          </div>
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Ngày sinh</label>
            <input type="date" id="form3Example3"  name="ngaysinh" class="form-control form-control-lg"
              />
            
          </div>
          </div>
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Email</label>
            <input type="email" id="form3Example3"  name="email" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Mật khẩu</label>
            <input type="password"  name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" />
            
          </div>
          <div class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Xác nhận Mật khẩu</label>
            <input type="password"  name="confirmpassword" id="form3Example4" class="form-control form-control-lg"
              placeholder="Confirm password" />
            
          </div>

         

          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="submit" value="Đăng ký" class="btn btn-success btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" />
       
          </div>

        </form>
      </div>
    </div>
  </div>

</section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>




