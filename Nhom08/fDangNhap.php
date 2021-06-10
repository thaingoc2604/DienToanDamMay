<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="css/dkdnStyle.css"/>
</head>
<body>
<?php include "nav.php";?>
<?php include "ConfigFB.php";?>
    <div class="main">
        <form class="container">
                <h1>Đăng nhập</h1>
                <br/><br/>
                <div class="mb-3 in">
                    <label for="ipTenDangNhap" class="form-label">Tên Đăng Nhập</label>
                    <input type="text" class="form-control" id="ipTenDangNhap">
                    <!-- <div id="emailHelp" class="form-text">Không được bỏ trống!</div> -->
                </div>
                <br/><br/>
                <div class="mb-3 in">
                    <label for="ipMatKhau" class="form-label">Mật Khẩu</label>
                    <input type="password" class="form-control" id="ipMatKhau">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Ghi nhớ tài khoản</label>
                </div>
                <br/>
                <button class="btn btn-primary" id="btnDangNhap">Đăng Nhập</button>
                
                <br/><br/><br/><span>Bạn có tài khoản chưa? Đăng ký</span>
                <a href="fDangKi.php">Tại đây</a>
        </form>
  
    </div>
    <script>
        const formLogin=document.querySelectorAll('.in input')
        const formLabel=document.querySelectorAll('.in label')
        for(let i=0;i<2;i++){
            formLogin[i].addEventListener("mouseover",function(){
                formLabel[i].classList.add("focus")
            })
            formLogin[i].addEventListener("mouseout",function(){
                if(formLogin[i].value==""){
                     formLabel[i].classList.remove("focus")
                }
            })
        }
    </script>


<script>
    const tenDangNhap = document.getElementById('ipTenDangNhap');
    const matKhau = document.getElementById('ipMatKhau');
    const btnDangNhap = document.getElementById('btnDangNhap');

    const TaiKhoan = dataBase.collection('TaiKhoan');


// Đăng kí tài khoản và kiểm tra trùng
btnDangNhap.addEventListener('click',e =>{
    e.preventDefault();
    if(tenDangNhap.value == '' || matKhau == ''){
        alert("Thông tin không được bỏ trống!");
    }
    else{
        TaiKhoan.get().then((querySnapshot) => {
            var dataTDN = '';
            var dataMK = '';
            querySnapshot.forEach((doc) => {
                if(tenDangNhap.value == doc.data().TenDangNhap && matKhau.value == doc.data().MatKhau){
                    dataTDN = doc.data().TenDangNhap;
                    dataMK = doc.data().MatKhau;
                }
            })
            if(tenDangNhap.value == dataTDN && matKhau.value == dataMK){
                window.location.href = "TrangChu.php";
            }
            else{
                alert('Hãy kiểm tra lại thông tin tài khoản!')
            }
        })
    }
});
    </script>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>