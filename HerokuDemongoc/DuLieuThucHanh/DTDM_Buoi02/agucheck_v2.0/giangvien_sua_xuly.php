<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/all.min.css" />
		
		<title>Sửa giảng viên</title>
	</head>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Sửa giảng viên</h5>
				<div class="card-body">
					
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			var docRef = db.collection('giangvien').doc('<?php echo $_POST['id']; ?>');
			
			docRef.update({
				mgv: '<?php echo $_POST['mgv']; ?>',
				hoten: '<?php echo $_POST['hoten']; ?>'
			})
			.then(() => {
				location.href = 'giangvien.php';
			})
			.catch((error) => {
				console.error('Error updating document: ', error);
			});
		</script>
	</body>
</html>