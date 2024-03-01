<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="/admin/product/storeImg" method="POST"  enctype="multipart/form-data">
    @csrf
<table align="center">

        <tr>
            <td colspan="2">Hình ảnh</td>
            <td colspan="2"><input type="file" name="img"></td>
        </tr>
        <tr>
            <td colspan="2"  >Tên sản phẩm</td>
            <td colspan="2">
                <select name="masp" class="form-select">
                   @foreach($arrProduct as $item)
                    <option value="{{$item->masp}}">{{$item->masp}} - {{$item->tensp}}</option>
                    @endforeach
                </select>
            </td>
       
            
        </tr>
        
        <tr>
            
          
           <td></td>
           
           
           <td colspan="2" > <input type="submit" value="Lưu" class="btn btn-outline-success" >
            
            </td>
            <td><button type="button" class="btn btn-outline-danger" data-dismiss="modal">Đóng</button></td>
        </tr>
    </table>
</form>
</body>
</html>