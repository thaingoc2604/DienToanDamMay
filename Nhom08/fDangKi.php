<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Đăng Kí Tài Khoản</title>
    <link rel="stylesheet" href="css/dkdnStyle.css"/>
    <style>
        .btnDKDN{
            position: relative;
            left: 130px;
        }
    </style>
</head>
<body>
    <?php include "nav.php";?>
    <?php include "ConfigFB.php";?>
    <div class="main">
        <form class="container">
                <h1>Đăng Kí Tài Khoản</h1>
                <div class="mb-3 in">
                    <input type="text" class="form-control" placeholder="Tên Đăng Nhập" id="ipTenDangNhap">
                </div>
                <div class="mb-3 in">
                    <input type="text" class="form-control" placeholder="Tên Người Dùng" id="ipTenNguoiDung">
                    <!-- <div id="emailHelp" class="form-text">Không được bỏ trống!</div> -->
                </div>
                <div class="mb-3 in">
                    <input type="text" class="form-control" placeholder="Email" id="ipEmail">
                    <!-- <div id="emailHelp" class="form-text">Không được bỏ trống!</div> -->
                </div>
                <div class="mb-3 in">
                    <input type="password" class="form-control" placeholder="Mật Khẩu" id="ipMatKhau">
                </div>
                <div class="mb-3 in">
                    <input type="password" class="form-control" placeholder="Nhập Lại Mật Khẩu" id="ipNhapLai">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Ghi nhớ tài khoản</label>
                </div>
                <br/>
                <div class="btnDKDN">
                    <button class="btn btn-primary" id="btnDangKi">Đăng Kí</button>
                    <button class="btn btn-primary" id="btnDangNhap">Đăng Nhập</button>
                </div>
               
                
        </form>
  
    </div>

<script>
    const tenDangNhap = document.getElementById('ipTenDangNhap');
    const tenNguoiDung = document.getElementById('ipTenNguoiDung');
    const Email = document.getElementById('ipEmail');
    const matKhau = document.getElementById('ipMatKhau');
    const nhapLaiMatKhau = document.getElementById('ipNhapLai');

    const btnInsert = document.getElementById('btnDangKi');

    const btnDangNhap = document.getElementById('btnDangNhap');
    const TaiKhoan = dataBase.collection('TaiKhoan');

    
// Đăng kí tài khoản và kiểm tra trùng
btnInsert.addEventListener('click',e =>{
    e.preventDefault();
    if(tenDangNhap.value == ''||tenNguoiDung.value == '' || Email.value == '' || matKhau == '' || nhapLaiMatKhau == ''){
        alert("Thông tin không được bỏ trống!");
    }
    else if(matKhau.value != nhapLaiMatKhau.value){
        alert("Mật khẩu nhập lại không trùng khớp!");
    }
    else{
        TaiKhoan.get().then((querySnapshot) => {
            var loaddata = '';
            querySnapshot.forEach((doc) => {
                if(tenDangNhap.value == doc.data().TenDangNhap){
                    loaddata = doc.data().TenDangNhap;
                }
            })
            if(tenDangNhap.value != loaddata){
                TaiKhoan.doc(tenDangNhap.value).set({
                    TenDangNhap: tenDangNhap.value,
                    TenNguoiDung: tenNguoiDung.value,
                    Emai: Email.value,
                    MatKhau:matKhau.value,
                })
                .then(() => {console.log('Insert Success!');alert("Thêm Tài khoản thành công");window.location.reload();})
                .catch(error => {console.error(error)})
            }
            else{
                alert('Tên Tài Khoản Đã Được Đăng Kí!');
            }
        })
    }
});

btnDangNhap.addEventListener('click',(e)=>{
    e.preventDefault();
    window.location.href="fDangNhap.php";
})

    </script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>