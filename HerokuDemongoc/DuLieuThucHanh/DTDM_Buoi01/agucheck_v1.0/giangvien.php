<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/all.min.css" />
		
		<title>Giảng viên</title>
	</head>
	
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Giảng viên</h5>
				<div class="card-body">
					<p><a class="btn btn-primary" href="#" role="button"><i class="fal fa-plus"></i> Thêm mới</a></p>
					
					<table class="table table-bordered mb-0">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th width="20%">Mã GV</th>
								<th width="65%">Họ và tên</th>
								<th width="5%">Sửa</th>
								<th width="5%">Xóa</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>1</th>
								<td>Mark</td>
								<td>Otto</td>
								<td><i class="fal fa-edit"></i></td>
								<td><i class="fal fa-trash-alt"></i></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
	</body>
</html>