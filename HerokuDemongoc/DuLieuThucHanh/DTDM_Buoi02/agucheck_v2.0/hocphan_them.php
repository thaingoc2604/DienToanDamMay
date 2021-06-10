<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/all.min.css" />
		
		<title>Thêm học phần</title>
	</head>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Thêm học phần</h5>
				<div class="card-body">
					<form action="hocphan_them_xuly.php" method="post">
						<div class="form-group">
							<label for="mhp">Mã HP</label>
							<input type="text" class="form-control" id="mhp" name="mhp" required />
						</div>
						
						<div class="form-group">
							<label for="tenhp">Tên học phần</label>
							<input type="text" class="form-control" id="tenhp" name="tenhp" required />
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