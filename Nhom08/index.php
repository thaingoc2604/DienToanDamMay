<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Weather Map</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<link rel="stylesheet" href="css/homePage.css"/>
    <?php include 'titleLogo.php'?>
</head>
<body>
	<?php include 'nav.php';?>

	<div class="intro">
		<h1>Weather Map</h1>
		<p>Website bản đồ giúp cung cấp các thông tin thời tiết của các khu vực, hỗ trợ việc chỉ đường và định vị GPS</p>
		<p>Được hỗ trợ trên các nền tảng OpenWeather API, GoogleMap API, cùng với Firestore Database</p>
	</div>

	<div class="btnDKDN">
		<button type="button" onclick="window.location.href='fDangNhap.php'" id="btnDangNhap"><span></span>Đăng Nhập</button>
      	<button type="button" onclick="window.location.href='fDangKi.php'" id="btnDangKi"><span></span>Đăng Kí</button>
	</div>

	<div class="imgDoiNgu">
		<img name="myimage" src="images/image1.jpg">
	</div>
	<footer>
		<div class="infoDoiNgu">
			<h5>Đội Ngũ Phát Triển</h5>
			<p>Phan Hoàng Trung - DTH185409</p>
			<p>Phương Thái Ngọc - DTH185327</p>
			<p>Trần Minh Trí - DTH185413</p>
		</div>
	</footer>
	<script language="javascript">
		
		window.onload = function(){
			setTimeout("switchImage()", 3000);
		}
		var current = 1;
		var numIMG = 9;

		function switchImage(){
			current++;
			document.images['myimage'].src = 'images/image'+ current + '.jpg';
			if(current == numIMG){
				current = 0;
			}
			setTimeout("switchImage()", 3000);
		}
	</script>

	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
	integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>