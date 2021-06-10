<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/all.min.css" />
		
		<title>Sửa sinh viên</title>
	</head>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Sửa sinh viên</h5>
				<div class="card-body">
					<form action="sinhvien_sua_xuly.php" method="post">
						<input type="text" id="id" name="id" hidden />
						
						<div class="form-group">
							<label for="msv">Mã SV</label>
							<input type="text" class="form-control" id="msv" name="msv" required />
						</div>
						
						<div class="form-group">
							<label for="hoten">Họ và tên</label>
							<input type="text" class="form-control" id="hoten" name="hoten" required />
						</div>
						
						<div class="form-group">
							<label for="lop">Lớp</label>
							<input type="text" class="form-control" id="lop" name="lop" required />
						</div>
						
						<button type="submit" class="btn btn-info">Cập nhật</button>
					</form>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			var docRef = db.collection('sinhvien').doc('<?php echo $_GET['id']; ?>');
			
			docRef.get().then((doc) => {
				if (doc.exists) {
					$('#id').val(doc.id);
					$('#msv').val(doc.data().msv);
					$('#hoten').val(doc.data().hoten);
					$('#lop').val(doc.data().lop);
				} else {
					console.log('No such document!');
				}
			}).catch((error) => {
				console.error('Error getting document: ', error);
			});
		</script>
	</body>
</html>