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
					
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			db.collection('hocphan').add({
				mhp: '<?php echo $_POST['mhp']; ?>',
				tenhp: '<?php echo $_POST['tenhp']; ?>'
			})
			.then((docRef) => {
				location.href = 'hocphan.php';
			})
			.catch((error) => {
				console.error('Error adding document: ', error);
			});
		</script>
	</body>
</html>