<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>
        @if(session()->has('error'))
            {{session()->get('error')}}
        @endif
    </h2>
    <form action="/login" method="POST">
        @csrf
        <table align="center">
            <tr>
                <td>Ten dang nhap</td>
                <td> <input type="text" name="username"> </td>
            </tr>
            <tr>
                <td>Mat khau</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2"> <input type="submit" value="Dang nhap"></td>
                
            </tr>
        </table>
    </form>
</body>
</html>