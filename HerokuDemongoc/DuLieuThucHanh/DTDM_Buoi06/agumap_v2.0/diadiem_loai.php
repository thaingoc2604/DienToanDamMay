<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Chọn loại địa điểm</h5>
				<div class="card-body pb-2">
					<div class="card-deck">
						<?php
							include "ketnoi.php";
							
							$sql = "SELECT * FROM loai_dia_diem";
							$danhsach = mysqli_query($link, $sql);
							
							while($dong = mysqli_fetch_array($danhsach))
							{
								echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">';
									echo '<div class="card">';
										echo '<img src="images/web_icons/'.$dong['bieu_tuong_web'].'" class="card-img-top" />';
										echo '<div class="card-body mb-0 pb-0">';
											echo '<p class="text-center font-weight-bold"><a href="diadiem_them.php"><i class="fad fa-plus"></i> '.$dong['dien_giai'].'</a></p>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							}
						?>
					</div>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
	</body>
</html>