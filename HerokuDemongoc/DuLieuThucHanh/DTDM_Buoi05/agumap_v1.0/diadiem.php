<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Địa điểm</h5>
				<div class="card-body">
					<a href="diadiem_them.php" class="btn btn-success mb-2"><i class="fal fa-plus"></i> Thêm địa điểm</a>
					<table id="PhanTrang" class="table table-bordered table-hover table-sm mb-0">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th width="12%">Loại địa điểm</th>
								<th width="12%">Người đăng</th>
								<th>Thông tin địa điểm</th>
								<th width="10%">Tọa độ</th>
								<th width="5%">Sửa</th>
								<th width="5%">Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include "ketnoi.php";
								
								$sql = "SELECT *
										FROM dia_diem d, loai_dia_diem l, nguoi_dung n
										WHERE d.id_loai = l.id AND d.id_user = n.id";
								$danhsach = mysqli_query($link, $sql);
								
								$stt = 1;
								while($dong = mysqli_fetch_array($danhsach))
								{
									echo '<tr>';
										echo '<td>'.$stt++.'</td>';
										echo '<td class="small">'.$dong['dien_giai'].'</td>';
										echo '<td class="small">'.$dong['ho_ten'].'</td>';
										
										$diachi = '';
										if(!empty($dong['so_duong'])) $diachi .= $dong['so_duong'] . ', ';
										if(!empty($dong['ten_duong'])) $diachi .= $dong['ten_duong'] . ', ';
										if(!empty($dong['ap_khom'])) $diachi .= $dong['ap_khom'] . ', ';
										if(!empty($dong['xa_phuong'])) $diachi .= $dong['xa_phuong'] . ', ';
										if(!empty($dong['huyen_thi'])) $diachi .= $dong['huyen_thi'];
										
										echo '<td>';
											echo '<span class="d-block text-primary font-weight-bold">'.$dong['ten_dia_diem'].'</span>';
											echo '<span class="d-block small">Địa chỉ: '.$diachi.'</span>';
										echo '</td>';
										
										echo '<td>';
											echo '<span class="d-block small text-monospace">'.$dong['vi_do'].'</span>';
											echo '<span class="d-block small text-monospace">'.$dong['kinh_do'].'</span>';
										echo '</td>';
										
										echo '<td class="text-center"><a href="diadiem_sua.php"><i class="fad fa-edit"></i></a></td>';
										echo '<td class="text-center"><a href="diadiem_xoa.php"><i class="fad fa-trash-alt text-danger"></i></a></td>';
									echo '</tr>';
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			$(document).ready(function(){
				$('#PhanTrang').DataTable({
					'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "Tất cả"]],
					'language': {
						'decimal': ',',
						'thousands': '.',
						'sProcessing': 'Đang xử lý...',
						'sLengthMenu': 'Xem _MENU_ mục',
						'sZeroRecords': 'Không tìm thấy dòng nào phù hợp',
						'sInfo': 'Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục',
						'sInfoEmpty': 'Đang xem 0 đến 0 trong tổng số 0 mục',
						'sInfoFiltered': '(được lọc từ _MAX_ mục)',
						'sInfoPostFix': '',
						'sSearch': 'Tìm:',
						'sUrl': '',
						'oPaginate': {
							'sFirst': 'Đầu',
							'sPrevious': 'Trước',
							'sNext': 'Tiếp',
							'sLast': 'Cuối'
						}
					}
				});
			});
		</script>
	</body>
</html>