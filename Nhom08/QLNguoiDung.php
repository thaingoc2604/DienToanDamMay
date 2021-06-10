<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quản lí người dùng</title>
    <!-- Link Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/ndStyle.css">
    <?php include 'titleLogo.php'?>
</head>
<body>
<!-- Nav Bar Menu -->
  
<?php include 'navTrangChu.php';?>

  <div class="container">
    <div class="card mt-3">

      <h5 class="card-header">QUẢN LÍ NGƯỜI DÙNG</h5>

      <div class="datatable" style="height:100%;">
        <table class="table table-striped table-hover" id="tableData">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên tài khoản</th>
              <th>Tên người dùng</th>
              <th>Email</th>
              <th>Xoá</th>
            </tr>
          </thead>

          <tbody id="ShowData"></tbody>

        </table>

        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>

      </div>

    </div>
  </div>

<br><br><br><br><br>


<!-- File cấu hình -->
<?php include "ConfigFB.php";?>

<script>

//Read data
    dataBase.collection('TaiKhoan').get().then((querySnapshot) => {
				var output="";
        var stt=1;
				querySnapshot.forEach((doc) => {
					output +='<tr>';
					output +='	<th scope="row">'+stt+'</th>';
					output +='	<td>'+doc.data().TenDangNhap+'</td>';
					output +='	<td>'+doc.data().TenNguoiDung+'</td>';
					output +='	<td>'+doc.data().Emai+'</td>';
					output +='	<td><a href="#" class="likXoa'+stt+'" onclick="xoaTK()">Xoá</a></td>';
					output +='	</tr>';
          stt++;
				});
				$('#ShowData').html(output);
			});
    //Delete data chưa làm
    function xoaTK(){

      // var dataTable = document.getElementById('ShowData');
      // var likXoa = document.querySelector('.likXoa');
      // for(var i=0;i<=likXoa;i++){
      //   console.log(dataTable.querySelector('td').innerHTML);
      //   var docTenDangNhap = dataTable.querySelector('td').innerHTML;
      // }

      
      // dataBase.collection('TaiKhoan').doc(txtId.value).delete({
      //     }).then(()=>{console.log('Delete Field Success!')})
            
    }
      
    
</script>

<!-- Link Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
