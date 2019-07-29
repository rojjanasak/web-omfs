<!doctype html>
<html lang="en">
<?php
include('../libs/config_omfs.php');

/* session_start();
$strpg = "SELECT * FROM user_profile  WHERE iden_number = '".$_SESSION['iden_number']."'   ";
    $objQuery = pg_query($db,$strpg);
    $objResult = pg_fetch_array($objQuery);

    $status = $objResult[status_user];


    if($_SESSION['iden_number'] == "")
    {
        header('Location: ../');
        exit();
    }

    else if( $status != "register_web"  && $status != "register_app" && $status != "super_admin"   )
    {
        header('Location: ../');
        exit();
    } */


?>
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../img/icon_top.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>O M F S</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
<style>
#map {
        width: 100%;
        height: 600px;
    }
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 12px;
	font-size: 18px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 0px solid #ddd;
}
</style>
	
</head>
<body>

    
        <div class="content">
            <div class="container-fluid">
                <div class="row">
				<br>
			<div class="col-md-8">
                        <div class="card">
                               <div id="map" ></div>
                            
                        </div>
                    </div>
					
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header" cellspacing="0" cellpadding="0" style="background-color:orange;">
                                <h4 class="title">ข้อมูลจุดความร้อน</h4>
								<br>
                            </div>
							<br>
							<div class="col-md-12">
							<div class="card" style="background-color:#565656">
							<br>
							<table class="table table-borderless" >
								  <tbody>
									<tr>
									<td><center><img src="https://images.vexels.com/media/users/3/137244/isolated/preview/c6b689bd0d2f7baaad783f9b6baa5263-cartoon-fire-illustration-by-vexels.png" width="60%" alt="">
									<h6 style="color:#fff">จุดความร้อนทั้งหมด</h6></center>
									</td>
									  <th scope="row"><h4 style="font-size:100px;color:#fff">60</h4> </th>
									</tr>
								  </tbody>
								</table>
							<br>
							</div>
							</div>
                            <div class="content">
							<h4 class="title">จุดความร้อนรายจังหวัด</h4>
							<br>
                                <table class="table table-borderless" >
								  <tbody>
									<tr>
									  <th scope="row">จังหวัดเชียงราย</th>
									  <td>120</td>

									</tr>
									<tr>
									  <th scope="row">จังหวัดพะเยา</th>
									  <td>60</td>

									</tr>
									<tr>
									  <th scope="row">จังหวัดแพร่</th>
									  <td>23</td>

									</tr>
									<tr>
									  <th scope="row">จังหวัดน่าน</th>
									  <td>2</td>

									</tr>
								  </tbody>
								</table>
								
                            </div>
                        </div>
						
						
                    </div>
					

                    
					
					
				
					
                </div>


            </div>
        </div>


       





</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script>
function myFunction() {
    document.getElementById("myDate1").defaultValue = "2018-01-01";
    document.getElementById("myDate2").defaultValue = "2018-02-01";
}
</script>
<script>

var map = L.map('map', {
    center: [19.043806, 100.069754],
    zoom: 8
});


// base layers
var OSM_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});

var roads = L.tileLayer('http://{s}.google.com/vt/lyrs=r&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});

var hybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});

var terrain = L.tileLayer('http://{s}.google.com/vt/lyrs=m,t&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});

var province = L.tileLayer.wms('http://119.59.125.191/geoserver/omfs/ows?', {
    layers: 'omfs:province',
    format: 'image/png',
    transparent: true,
    zIndex: 5
});

var amphoe = L.tileLayer.wms('http://119.59.125.191/geoserver/omfs/ows?', {
    layers: 'omfs:amphoe',
    format: 'image/png',
    transparent: true,
    zIndex: 5
});

var tambon = L.tileLayer.wms('http://119.59.125.191/geoserver/omfs/ows?', {
    layers: 'omfs:tambon',
    format: 'image/png',
    transparent: true,
    zIndex: 5
});


var baseLayers = {
    "OSM": OSM_Mapnik.addTo(map),
    "ถนน": roads,
    "ดาวเทียมและถนน": hybrid,
    "ภูมิประเทศ": terrain
};

var overlay = {
    "จังหวัด": province.addTo(map),
    "อำเภอ": amphoe,
    "ตำบล": tambon
};

var lyrGroup = L.layerGroup();

L.control.layers(baseLayers, overlay).addTo(map);


$.getJSON('http://localhost:3000/hp/hp_modis24', res => {
	const icon = L.icon({
        iconUrl: '../img/fire_icon2.gif',
        iconSize: [20, 20],
        iconAnchor: [12, 37],
        popupAnchor: [5, -30]
    });
	let marker = L.geoJSON(res.data, {
        pointToLayer: function (feature, latlng) {
            return L.marker(latlng, {
                icon: icon
            });
        },
        onEachFeature: (feature, layer) => {
            if (feature.properties) {
                layer.bindPopup(
                    'จังหวัด: ' + feature.properties.tam.pv_tn + '</br> อำเภอ: ' + feature.properties.tam.ap_tn + '</br> ตำบล: ' + feature.properties.tam.tb_tn + '</br>'
                );
            }
        }
	}).addTo(map);
 });


// $.ajax({
// dataType: "json",
// url: "http://localhost:3000/hp/hp_modis24",
// success: function(res){

// $.each(res.data , function() { //refer to the Json object to address the actual names
// if (res.data.features[0].properties.tam.pv_code === `57`) {
	// console.log(res.data.features[0].properties.tam)
// }
// console.log("sdas")
    // });

// }
// });

 // $.ajax({
  // dataType: "json",
  // url: "http://localhost:3000/hp/hp_modis24",
  // success: function(res){
	// //var length = Object.keys(res.data.features[0].properties.tam.pv_code === '56').length;
	// //var loa = res.data
	// //console.log(loa.length);
	// // if (res.data.features[0].properties.tam.pv_code === `57`) {
		// // var length = Object.keys(res.data.features[0].properties).length;
         // // console.log(length);
     // // }
	// var len = Object.keys(res.data.features[0].properties).length;
    // console.log(len);

// }
 // });
 

 
});
	
</script>





</html>
