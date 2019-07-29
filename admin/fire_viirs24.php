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
        height: 610px;
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
							<br><br>
							<div id="container" style="min-width: 210px; height: 250px; margin: 0 auto"></div>
							
                            <div class="content">
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

var baseLayers = {
    "OSM": OSM_Mapnik.addTo(map),
    "ถนน": roads,
    "ดาวเทียมและถนน": hybrid,
    "ภูมิประเทศ": terrain
};


var lyrGroup = L.layerGroup();

L.control.layers(baseLayers).addTo(map);


 $.getJSON('http://localhost:3000/hp/hp_viirs24', res => {
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
                    'ชื่อ: ' + feature.properties.instrument + '</br>'
                );
            }
        }
	}).addTo(map);
 });


 
 
 
 Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
	credits: {
          enabled: false
    },
    xAxis: {
        categories: ['เชียงราย', 'พะเยา', 'แพร่', 'น่าน']
    },
    yAxis: {
        title: {
            text: 'จำนวนจุดความร้อน'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: ' ',
        data: [120, 60, 23, 2]
    }]
});
 

	
</script>





</html>
