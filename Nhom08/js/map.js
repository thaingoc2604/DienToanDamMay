
// Cài đặt thanh thông tin bên trái của map
function show(){
	document.getElementById('sidebar').classList.toggle('active');
}
function show2(){
	document.getElementById('sidebarChiDuong').classList.toggle('active');
}
// Khoanh vùng biên giới --null
// chỉ đường + geoplace
// Marker khi chấm vào và hiển thị thông tin
// div left hiển thị hình ảnh + mô tả + thông tin + thời tiết
// Phần quyền và hiển thị thông tin người dùng trên thanh 'nav'

const wheather_API = 'bed3d99a451f7b2e24f1f10d53c84586';
const Map_API = 'AIzaSyDKbUG34YYWxj9VnkrR0LOEiVwhPPt0dHU';
const DEAFAULT_VALUE='--'

// Event
const searchInput = document.querySelector('#search-input');
const cityName=document.querySelector('.city-name');
const weatherState=document.querySelector('.weather-state');
const weatherIcon=document.querySelector('.weather-icon');
const temprature=document.querySelector('.temperature');
const sunrise=document.querySelector('.sunrise');
const sunset=document.querySelector('.sunset');
const humidity=document.querySelector('.humidity');
const windSpeed=document.querySelector('.wind-speed');
const pressure = document.querySelector('.pressure');
const seaLevel = document.querySelector('.sea-level');
const tempMax = document.querySelector('.temp-max');
const tempMin = document.querySelector('.temp-min');

const nameLocation = document.querySelector('#nameLocation');
const disLocation = document.querySelector('#disLocation');


const btnLocation = document.getElementById("btnLocation");

//Hàm khởi tạo Map


function LoadInfoWheather(urlWheather){
	fetch(urlWheather)
		.then(async res=>{
		const data=await res.json();
		// console.log('[Search Input]', data);
		cityName.innerHTML=data.name || DEAFAULT_VALUE;
		weatherState.innerHTML=data.weather[0].description || DEAFAULT_VALUE;
		weatherIcon.setAttribute('src',`http://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`);
		// Cài đặt thông tin thời tiết
		temprature.innerHTML=Math.round(data.main.temp) || DEAFAULT_VALUE;
		// Nhiệt độ cao nhất + thấp
		sunrise.innerHTML=moment.unix(data.sys.sunrise).format('H:mm') || DEAFAULT_VALUE;
		sunset.innerHTML=moment.unix(data.sys.sunset).format('H:mm') || DEAFAULT_VALUE;
		humidity.innerHTML=data.main.humidity || DEAFAULT_VALUE;
		windSpeed.innerHTML=(data.wind.speed * 3.6).toFixed(2) || DEAFAULT_VALUE;
		pressure.innerHTML=data.main.pressure;
		seaLevel.innerHTML=data.main.sea_level;
		tempMax.innerHTML=data.main.temp_max;
		tempMin.innerHTML=data.main.temp_min;
	});
}


// Hàm định vị GPS
function GPSLocation(infoWindow){
	btnLocation.addEventListener("click", () => {
	  if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
		  (position) => {
			const pos = {
			  lat: position.coords.latitude,
			  lng: position.coords.longitude,
			};
			infoWindow.setPosition(pos);
			infoWindow.open(map);
			map.setCenter(pos);
			var urlMapLatLng = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${pos.lat},${pos.lng}&key=AIzaSyDKbUG34YYWxj9VnkrR0LOEiVwhPPt0dHU`;
			zoomAndMarker(urlMapLatLng);
			var urlWheatherLatLng = `https://api.openweathermap.org/data/2.5/weather?lat=${pos.lat}&lon=${pos.lng}&appid=${wheather_API}&units=metric&lang=vi`;
			LoadInfoWheather(urlWheatherLatLng);
		  },
		  () => {
			handleLocationError(true, infoWindow, map.getCenter());
		  }
		);
	  } else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
	  }
	});
// Báo lỗi trong định vị GPS
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(
	browserHasGeolocation
		? "Error: The Geolocation service failed."
		: "Error: Your browser doesn't support geolocation."
	);
	infoWindow.open(map);
	}
}
// Hàm thêm Thông tin và marker
function addmarket(vt){
	var marker = new google.maps.Marker({
	  position:vt.position,
	  map:map,
	  draggable:true,
	  animation:google.maps.Animation.DROP,
	});
		map.setZoom(8);
		map.setCenter(marker.getPosition());
	if(vt.content)
	{
		const infoWD=new google.maps.InfoWindow({
			content:'<h6>Địa chỉ: ' + vt.content.Diachi + '</h6>' +  'Vĩ độ: ' + vt.content.Vido + '<br/>' + 'Kinh độ: ' + vt.content.Kinhdo
	 	});
		//  Sự kiện click lại marker hiển thị lại dữ liệu thời tiết
		marker.addListener('click',function(){	
			infoWD.open(map,marker);
			var urlWheatherLatLng =  `https://api.openweathermap.org/data/2.5/weather?lat=${vt.position.lat}&lon=${vt.position.lng}&appid=bed3d99a451f7b2e24f1f10d53c84586&units=metric&lang=vi`;
			LoadInfoWheather(urlWheatherLatLng);
			nameLocation.innerHTML = 'Địa chỉ: ' + vt.content.Diachi;
			disLocation.innerHTML = 'Vĩ độ: ' + vt.content.Vido + '<br/>' + 'Kinh độ: ' + vt.content.Kinhdo;
		});
	}  

	google.maps.event.addListener(marker,'click',function() {
		map.setZoom(8);
		map.setCenter(marker.getPosition());
	});
}

// Hàm gán marker, phóng to và hiển thị thông tin ở vị trí đó.
function zoomAndMarker(url){
	fetch(url)
	.then(async res=>{
		const set = await res.json();
		// console.log('[search map]',set);
		let MarketArray =
            {
				position: {lat: set.results[0].geometry.location.lat, lng: set.results[0].geometry.location.lng},
          		content: {Diachi: set.results[0].formatted_address, Vido: set.results[0].geometry.location.lat ,Kinhdo: set.results[0].geometry.location.lng}
			}
		addmarket(MarketArray);
		nameLocation.innerHTML = 'Địa chỉ: ' + MarketArray.content.Diachi;
		disLocation.innerHTML = 'Vĩ độ: ' + MarketArray.content.Vido + '<br/>' + 'Kinh độ: ' + MarketArray.content.Kinhdo;
		infoWindow.setContent('<h6>Địa chỉ: ' + MarketArray.content.Diachi + '</h6>' +'Vĩ độ: ' + MarketArray.content.Vido + '<br/>' + 'Kinh độ: ' + MarketArray.content.Kinhdo);
	});
}

// Sự kiện trên thanh tìm kiếm tìm kiếm
searchInput.addEventListener('change',(e)=>{
	console.log(e.target.value);
	var urlWheatherDiaDiem = `https://api.openweathermap.org/data/2.5/weather?q=${e.target.value}&appid=${wheather_API}&units=metric&lang=vi`;
	LoadInfoWheather(urlWheatherDiaDiem)
	var urlMapDiaCHi = `https://maps.googleapis.com/maps/api/geocode/json?address=${e.target.value}&key=${Map_API}&lang=vi`;
	zoomAndMarker(urlMapDiaCHi)

	
});

// Hàm sự kiện click trên map hiển thị toạ độ và thời tiết ở infowindow đó
function mapClickInfo(infoWindow){
	map.addListener("click", (mapsMouseEvent) => {
		// Close the current InfoWindow.
		infoWindow.close();
		// Create a new InfoWindow.
		infoWindow = new google.maps.InfoWindow({
			position: mapsMouseEvent.latLng,
			content:`Latitude: ${mapsMouseEvent.latLng.lat()}`+`<br/>`+`<br/>Longgitude: ${mapsMouseEvent.latLng.lng()}`
		});
		
		var urlWheatherLatLng = `https://api.openweathermap.org/data/2.5/weather?lat=${mapsMouseEvent.latLng.lat()}&lon=${mapsMouseEvent.latLng.lng()}&appid=bed3d99a451f7b2e24f1f10d53c84586&units=metric&lang=vi`;
		LoadInfoWheather(urlWheatherLatLng);
		infoWindow.open(map);
	});
}


// function initMap() {
    var options = 
     {
      center: {lat: 10.378428946608638, lng: 105.43958084844778 },
      zoom: 7,
      scrollwheel:true,
	  types: ['(cities)']
    }

   	map = new google.maps.Map(document.getElementById("map"),options)
   	let infoWindow = new google.maps.InfoWindow();
	GPSLocation(infoWindow);
	infoWindow.open(map);
	mapClickInfo(infoWindow);

	var directionsDisplay = new google.maps.DirectionsRenderer();
	directionsDisplay.setMap(map);


	var marker = new google.maps.Marker({
		map:map,
		draggable:true,
		animation:google.maps.Animation.DROP,
	  });

	// auto search
	var autoSearch = new google.maps.places.Autocomplete(document.getElementById("search-input"),options)
	 autoSearch = new google.maps.places.Autocomplete(document.getElementById("search-tu"),options)
	 autoSearch = new google.maps.places.Autocomplete(document.getElementById("search-den"),options)

	autoSearch.addListener('place_changed',function(){
	  place = autoSearch.getPlace();
	  map.setCenter(place.geometry.location);
	  marker.setPosition(place.geometry.location);
	  console.log(autoSearch.getPlace());
	
	})
// }

var directionsService = new google.maps.DirectionsService();

//create a DirectionsRenderer object which we will use to display the route
var directionsDisplay = new google.maps.DirectionsRenderer();

//bind the DirectionsRenderer to the map
directionsDisplay.setMap(map);

var myLatLng = { lat: 10.371824649098098, lng: 105.43240326983677 };
//define calcRoute function
function calcRoute() {
	let infoWindow = new google.maps.InfoWindow();
    //create request
    var request = {
        origin: document.getElementById("search-tu").value,
        destination: document.getElementById("search-den").value,
        travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.METRIC
    }

    //pass the request to the route method
    directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {

            //Get distance and time
            const output = document.querySelector('#output');
            output.innerHTML = "Từ: " + document.getElementById("search-tu").value + ".<br />Đến: " + document.getElementById("search-den").value + ".<br /> Khoảng cách lái xe <i class='fas fa-road'></i> : " + result.routes[0].legs[0].distance.text + ".<br />Thời gian <i class='fas fa-hourglass-start'></i> : " + result.routes[0].legs[0].duration.text + ".";

            //display route
            directionsDisplay.setDirections(result);
        } else {
            //delete route from map
            directionsDisplay.setDirections({router: []});
            //center map in London
            map.setCenter(myLatLng);

            //show error message
            output.innerHTML = "<div class='alert-danger'><i class='fas fa-exclamation-triangle'></i> Could not retrieve driving distance.</div>";
        }
    });

}
