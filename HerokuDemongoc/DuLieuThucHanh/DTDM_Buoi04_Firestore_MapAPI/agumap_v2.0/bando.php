<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Bản đồ</h5>
				<div id="map"></div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3KjEa7xtALLCMJHqufeQP6AGQSwHDBTs&callback=initMap"></script>
		<script>
			let map;
			function initMap() {
				map = new google.maps.Map(document.getElementById('map'), {
					center: { lat: 10.378417126584438, lng: 105.43950858227626 },
					zoom: 15,
				});
				
				var marker;
				var infowindow = new google.maps.InfoWindow();
				var markericon;
				
				db.collection('diadiem').get().then((querySnapshot) => {
					querySnapshot.forEach((doc) => {
						if(doc.data().LoaiDiaDiem == 4)
							markericon = 'images/hotel.png';
						else if(doc.data().LoaiDiaDiem == 5)
							markericon = 'images/hospital.png';
						else
							markericon = 'images/restaurant.png';
						
						marker = new google.maps.Marker({
							position: new google.maps.LatLng(doc.data().ToaDo.latitude, doc.data().ToaDo.longitude),
							map: map,
							icon: markericon
						});
						var info = '<div><h6 class="text-primary">'+doc.data().TenDiaDiem+'</h6><p class="mb-0"><strong>Địa chỉ</strong>: '+doc.data().DiaChi+'</p></div>';
						google.maps.event.addListener(marker, 'click', (function(marker) {
							return function() {
								infowindow.setContent(info);
								infowindow.open(map, marker);
							}
						})(marker));
					});
				});
				
				const styles = {
					default: [],
					hide: [
						{
							featureType: 'poi',
							stylers: [{ visibility: 'off' }],
						},
						{
							featureType: 'transit',
							elementType: 'labels.icon',
							stylers: [{ visibility: 'off' }],
						},
					],
				};
				map.setOptions({ styles: styles['hide'] });
			}
		</script>
	</body>
</html>