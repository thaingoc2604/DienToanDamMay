<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Weather Map</title>
	<script src="js/all.min.js"></script>
	<script src="js/moment.js"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/mapStyle.css">
    <?php include 'titleLogo.php'?>
</head>
<body>


<?php include 'navTrangChu.php';?>
	<!-- Đổ map -->
	<div class="fmap">
		<div class="card mt-3">
			<h5 class="card-header"><img src="images/partly_cloudy_night_200px.png" id="iconFrmMap">&emsp; &emsp;&emsp; Weather Map</h5>
			<div class="card-body">
				<div id="map"></div>
			</div>
		</div>
	</div>

	<div id="sidebarChiDuong">
		<div class="toggle-btnChiDuong" onclick="show2()">
			<img src="images/google_maps_48px.png" alt="">
		</div>
		<h3 id="titChiDuong">DỊCH VỤ CHỈ ĐƯỜNG</h3>


		<div class="search-barChiDuong">
			<input class="form-control mr-sm-2" id="search-tu"
			type="search" placeholder="Từ" aria-label="Search"><br/>
			<input class="form-control mr-sm-2" id="search-den"
			type="search" placeholder="Đến" aria-label="Search">
		</div>

		<div class="Control_ChiDuong">
			<button type="button" class="btn btn-success" id="btnTimDuong" onclick="calcRoute()">Tìm đường</button>
			<button type="button" class="btn btn-secondary" id="btnLocation">Vị trí của bạn</button>
		</div>
		
		<div class="fTtDuongDi">
			<h6 id="tTDuongDi">Thông tin</h6>
			<p id="output"></p>
		</div>
		
	</div>
	<div id="sidebar">
			<div class="toggle-btn" onclick="show()">
				<img src="images/Clouds_50px.png" alt="">
			</div>
	

			<div class="main-section">
				<div class="search-bar">
					<input class="form-control mr-sm-2" name="search-city" id="search-input"  
					type="search" placeholder="Search" aria-label="Search">
				</div>

				<div class="ttDiaDiem">
					<h3 id="titDiaDiem">THÔNG TIN ĐỊA ĐIỂM</h3><br>
					<h5 id="nameLocation"></h5>
					<p id="disLocation"></p>
				</div>
				
			
				

			<div class="wheatherInfo">

				<div class="info-wrapper">
					<p class="city-name">---</p>
					<p class="weather-state">---</p>
					<img src="http://openweathermap.org/img/wn/10d@2x.png" alt="weather icon" class="weather-icon">
					<p class="temperature">---</p> 
							
					
				<div class="additional-section">

					<div class="row">
						<div class="item">
							<div class="label">Nhiệt độ cao nhất</div>
							<div class="vlTemp"><span class="temp-max">---</span>°C</div>
						</div>
						<div class="item">
							<div class="label">Nhiệt độ thấp nhất</div>
							<div class="vlTemp"><span class="temp-min">---</span>°C</div>
						</div>
					</div>

					<div class="row">
						<div class="item">
							<div class="label">Độ ẩm</div>
							<div class="value"><span class="humidity">---</span>%</div>
						</div>
						<div class="item">
							<div class="label">Tốc độ gió</div>
							<div class="value"><span class="wind-speed">---</span>km/h</div>
						</div>
					</div>

					<div class="row">
						<div class="item">
							<div class="label">Sức ép khí quyển</div>
							<div class="value"><span class="pressure">---</span>Pa</div>
						</div>
						<div class="item">
							<div class="label">Mực nước biển</div>
							<div class="value"><span class="sea-level">---</span>m</div>
						</div>
					</div>

					<div class="row">

						<div class="item">
							<div class="label">MT Mọc</div>
							<div class="value sunrise">---</div>
						</div>
						<div class="item">
							<div class="label">MT Lặn</div>
							<div class="value sunset">---</div>
						</div>
					</div>
					

				</div>

			</div>
			
		</div>
	</div>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKbUG34YYWxj9VnkrR0LOEiVwhPPt0dHU&libraries=places"></script>  
	<script src="js/map.js"></script>
	
		<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKbUG34YYWxj9VnkrR0LOEiVwhPPt0dHU&callback=initMap" -->
		<!-- type="text/javascript"></script> -->



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>