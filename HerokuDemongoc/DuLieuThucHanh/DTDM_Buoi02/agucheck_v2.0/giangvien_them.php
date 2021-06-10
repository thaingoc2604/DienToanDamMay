<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/all.min.css" />
		
		<title>Thêm giảng viên</title>
	</head>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Thêm giảng viên</h5>
				<div class="card-body">
					<form action="giangvien_them_xuly.php" method="post">
						<div class="form-group">
							<label for="mgv">Mã GV</label>
							<input type="text" class="form-control" id="mgv" name="mgv" required />
						</div>
						
						<div class="form-group">
							<label for="hoten">Họ và tên</label>
							<input type="text" class="form-control" id="hoten" name="hoten" required />
						</div>
						
						<button type="submit" class="btn btn-primary">Thêm mới</button>
					</form>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
	</body>
</html>