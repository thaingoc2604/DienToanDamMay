<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Nhập địa điểm</h5>
				<div class="card-body">
					<?php
						$link = mysqli_connect("127.0.0.1", "root", "vertrigo", "agumap");
						$sql = "SELECT * FROM `dia_diem` WHERE 1";
						$danhsach = mysqli_query($link, $sql);
						
						$dsdiadiem = [];
						while($dong = mysqli_fetch_array($danhsach))
						{
							$diadiem['ID'] = $dong['id'];
							$diadiem['Ten'] = $dong['ten_dia_diem'];
							$diadiem['Loai'] = $dong['id_loai'];
							$diadiem['ViDo'] = $dong['vi_do'];
							$diadiem['KinhDo'] = $dong['kinh_do'];
							
							$diachi = '';
							if(!empty($dong['so_duong'])) $diachi .= $dong['so_duong'] . ', ';
							if(!empty($dong['ten_duong'])) $diachi .= $dong['ten_duong'] . ', ';
							if(!empty($dong['ap_khom'])) $diachi .= $dong['ap_khom'] . ', ';
							if(!empty($dong['xa_phuong'])) $diachi .= $dong['xa_phuong'] . ', ';
							if(!empty($dong['huyen_thi'])) $diachi .= $dong['huyen_thi'];
							$diadiem['DiaChi'] = $diachi;
							
							$dsdiadiem[] = $diadiem;
						}
						// var_dump($dsdiadiem);
					?>
					<div id="KetQua">
						<div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
							<span id="ThongBao"></span>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			$('#KetQua').hide();
			
			// Get a new write batch
			var batch = db.batch();
			
			<?php
				foreach($dsdiadiem as $value)
				{
			?>
					var docRef = db.collection("diadiem").doc("<?php echo str_pad($value['ID'], 10, '0', STR_PAD_LEFT); ?>");
					batch.set(docRef, {
						TenDiaDiem: "<?php echo $value['Ten']; ?>",
						LoaiDiaDiem: "<?php echo $value['Loai']; ?>",
						DiaChi: "<?php echo $value['DiaChi']; ?>",
						ToaDo: new firebase.firestore.GeoPoint(<?php echo $value['ViDo']; ?>, <?php echo $value['KinhDo']; ?>)
					});
			<?php
				}
			?>
			
			// Commit the batch
			batch.commit().then(() => {
				$('#KetQua').show();
				$('#ThongBao').html('Đã nhập thành công <?php echo count($dsdiadiem); ?> địa điểm vào Firestore.');
			}).catch((error) => {
				$('#KetQua').show();
				$('#ThongBao').html('Lỗi nhập dữ liệu: ' + error);
			});
		</script>
	</body>
</html>