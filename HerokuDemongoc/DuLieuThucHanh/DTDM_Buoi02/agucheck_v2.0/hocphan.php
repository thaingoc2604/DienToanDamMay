<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/all.min.css" />
		
		<title>Học phần</title>
	</head>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Học phần</h5>
				<div class="card-body">
					<a href="hocphan_them.php" class="btn btn-success mb-2">Thêm mới</a>
					
					<table class="table table-bordered table-hover table-sm mb-0">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th width="20%">Mã HP</th>
								<th width="65%">Tên học phần</th>
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
			db.collection('hocphan').get().then((querySnapshot) => {
				var stt = 1;
				var output = '';
				
				querySnapshot.forEach((doc) => {
					output += '<tr>';
						output += '<th>'+stt+'</th>';
						output += '<td>'+doc.data().mhp+'</td>';
						output += '<td>'+doc.data().tenhp+'</td>';
						output += '<td class="text-center"><a href="hocphan_sua.php?id='+doc.id+'">Sửa</a></td>';
						output += '<td class="text-center"><a onclick="return confirm(\'Bạn có muốn xóa học phần '+doc.data().tenhp+' không?\')" href="hocphan_xoa.php?id='+doc.id+'">Xóa</a></td>';
					output += '</tr>';
					
					stt++;
				});
				
				$('#HienThi').html(output);
			});
		</script>
	</body>
</html>