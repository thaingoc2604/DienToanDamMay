<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/all.min.css" />
		
		<title>Thêm sinh viên</title>
	</head>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Thêm sinh viên</h5>
				<div class="card-body">
					
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			db.collection('sinhvien').add({
				msv: '<?php echo $_POST['msv']; ?>',
				hoten: '<?php echo $_POST['hoten']; ?>',
				lop: '<?php echo $_POST['lop']; ?>'
			})
			.then((docRef) => {
				location.href = 'sinhvien.php';
			})
			.catch((error) => {
				console.error('Error adding document: ', error);
			});
		</script>
	</body>
</html>