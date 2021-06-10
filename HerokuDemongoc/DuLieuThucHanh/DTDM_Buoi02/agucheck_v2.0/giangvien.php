<!DOCTYPE html>
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
					<a href="giangvien_them.php" class="btn btn-success mb-2">Thêm mới</a>
					
					<table class="table table-bordered table-hover table-sm mb-0">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th width="20%">Mã GV</th>
								<th width="65%">Họ tên</th>
								<th width="5%">Sửa</th>
								<th width="5%">Xóa</th>
							</tr>
						</thead>
						<tbody id="HienThi">
							
						</tbody>
					</table>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			db.collection('giangvien').get().then((querySnapshot) => {
				var stt = 1;
				var output = '';
				
				querySnapshot.forEach((doc) => {
					output += '<tr>';
						output += '<th>'+stt+'</th>';
						output += '<td>'+doc.data().mgv+'</td>';
						output += '<td>'+doc.data().hoten+'</td>';
						output += '<td class="text-center"><a href="giangvien_sua.php?id='+doc.id+'">Sửa</a></td>';
						output += '<td class="text-center"><a onclick="return confirm(\'Bạn có muốn xóa giảng viên '+doc.data().hoten+' không?\')" href="giangvien_xoa.php?id='+doc.id+'">Xóa</a></td>';
					output += '</tr>';
					
					stt++;
				});
				
				$('#HienThi').html(output);
			});
		</script>
	</body>
</html>