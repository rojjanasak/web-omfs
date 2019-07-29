<!doctype html>
<html lang="en">
<?php
include('../../libs/config_omfs.php');

session_start();
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
    }

	$prov_name = $_GET[prov_name];
	$amphoe_name = $_GET[amphoe_name];
	$tambon_name = $_GET[tambon_name];
	$date  = $_GET[date];
	$satte = $_GET[satte];
	$show_point = $_GET[show_point];
	//$date_start = date("Y/m/d");$_GET[date_end]
	$date_start = $_GET[date_start];
	$date_end = $_GET[date_end];
	$satte = $_GET[satte];
	$show_point = $_GET[show_point];
?>

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!--  CSS LEAFLET     -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.1.0/dist/leaflet.css" integrity="sha512-wcw6ts8Anuw10Mzh9Ytw4pylW8+NAD4ch3lqm9lzAsTxg0GFeJgoAtxuCLREZSC5lUXdVyo/7yfsqFjQ4S+aKw==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.1.0/dist/leaflet.js" integrity="sha512-mNqn2Wg7tSToJhvHcqfzLMU6J4mkOImSPTxVZAdo+lcPlk+GhZmYgACEe0x35K7YzW1zJ7XyJV/TT1MrdXvMcA==" crossorigin=""></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1AO13H8MYTwPKioaW5qgGwdPXYpXbw4w"></script>
    <script src='https://unpkg.com/leaflet.gridlayer.googlemutant@latest/Leaflet.GoogleMutant.js'></script>

    <!--   Core JS Files   -->
	<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<!-- <script src="assets/js/bootstrap.min.js" type="text/javascript"></script> -->

	<!--  Checkbox, Radio & Switch Plugins -->
	<!-- <script src="assets/js/bootstrap-checkbox-radio.js"></script> -->

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>


	<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<!-- <script src="assets/js/paper-dashboard.js"></script> -->

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<!-- <script src="assets/js/demo.js"></script> -->


    <style>
    .info {
        padding: 6px 8px;
        font: 14px/16px Arial, Helvetica, sans-serif;
        background: white;
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }

    .info h4 {
        margin: 0 0 5px;
        color: #777;
    }

    .legend {
    text-align: left;
    line-height: 18px;
    color: #555;
    }
    .legend i {
    width: 12px;
    height: 12px;
    float: left;
    margin-right: 5px;
    opacity: 0.7;
    }
    .legend .circle {
    border-radius: 50%;
    width: 10px;
    height: 10px;
    margin-top: 8px;
    }
</style>
</head>

<body>

    <div class="wrapper">

        <div>
            <div class="content">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                </div>
                                <div class="content">
                                    <div id="map" style="width: 100%; height: 650px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>

<script type="text/javascript">
    var OBECData =    <?php
//-------------------------------------------------------------
// * Name: PHP-PostGIS2GeoJSON
// * Purpose: GIST@NU (www.cgistln.nu.ac.th)
// * Date: 2016/10/13
// * Author: Chingchai Humhong (chingchaih@nu.ac.th)
// * Acknowledgement:
//-------------------------------------------------------------
// Database connection settings


    // Retrieve start point
    // Connect to database

         $sql = "select count(*),a.pv_tn, a.pv_code,ST_AsGeoJSON(b.geom) AS geojson
            from fire_status  a
            inner join  province_sim b on a.pv_code = b.pv_code
            group by a.pv_code,b.geom ,a.pv_tn
            limit 10
            ; ";


   // Perform database query
   $query = pg_query($db,$sql);
   //echo $sql;
    // Return route as GeoJSON
   $geojson = array(
      'type'      => 'FeatureCollection',
      'features'  => array()
   );

   // Add geom to GeoJSON array
   while($edge=pg_fetch_assoc($query)) {
      $feature = array(
         'type' => 'Feature',
         'geometry' => json_decode($edge['geojson'], true),
         'crs' => array(
            'type' => 'EPSG',
            'properties' => array('code' => '4326')
         ),
            'properties' => array(
            'gid' => $edge['gid'],
            'pv_code' => $edge['pv_code'],
            'prov_nam_t' => $edge['pv_tn'],
            'value_sum' => $edge['count'],
            'value' => number_format($edge['count'])
         )
      );

      // Add feature array to feature collection array
      array_push($geojson['features'], $feature);
   }
   // Close database connection

   // Return routing result
   // header('Content-type: application/json',true);
  echo json_encode($geojson);

        $lat = 19.043806 ;
        $lon = 100.069754;
        $zoom = 8;
?>

	//init map
	var map = L.map('map');
	map.setView([<?php echo $lat ?>, <?php echo $lon ?>],<?php echo $zoom ?>);

 //    var gmap = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
	//     maxZoom: 20,
	//     subdomains:['mt0','mt1','mt2','mt3']
	// }).addTo(map);

     var mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

    var grayscale = L.tileLayer(mbUrl, {id: 'mapbox.light'});
    var streets = L.tileLayer(mbUrl, {id: 'mapbox.streets'});
    var roads = L.gridLayer.googleMutant({
            type: 'roadmap' // valid values are 'roadmap', 'satellite', 'terrain' and 'hybrid'
    });

    var satellite = L.gridLayer.googleMutant({
        type: 'satellite' // valid values are 'roadmap', 'satellite', 'terrain' and 'hybrid'
    });

    var terrain = L.gridLayer.googleMutant({
        type: 'terrain' // valid values are 'roadmap', 'satellite', 'terrain' and 'hybrid'
    });



    var LeafIcon = L.Icon.extend({
            options: {
                iconSize:     [15, 20]
            }
        });

    var type3 = new LeafIcon({iconUrl: '../img/icon_status/03.png'}), //red
        type2 = new LeafIcon({iconUrl: '../img/icon_status/02.png'}), //blue
        type1 = new LeafIcon({iconUrl: '../img/icon_status/01.png'}); //yellow

    var fireReport = L.layerGroup();


  <?php
        $result5 = pg_query($db,"SELECT * From fire_status ;");
        while ($row5 = pg_fetch_array($result5)  ) {   ?> 

             <?php 
                                                    if ($row5[status] == 'type1') {
                                                        $status = "ไม่ใช่จุดที่เกิดไฟป่า";
                                                    }else if($row5[status] == 'type2'){
                                                        $status = "จุดไฟป่าที่ทำการดับแล้ว";
                                                    }else if($row5[status] == 'type3'){
                                                        $status = "ยังไม่ได้ดำเนินการ";
                                                    }else{
                                                        $status = "";
                                                    }
                                                ?>

    L.marker([<?php echo $row5[latitude],',',$row5[longitude] ;  ?>], {icon: <?php echo $row5[status]; ?>}).bindPopup("<table class='table'> <tr><td>สถานะไฟ : </td><td><?php echo $status ;?></td></tr>  <tr><td>วันที่แจ้ง : </td><td><?php echo $row5[acq_date];?></td></tr>  <tr><td>ตำบล : </td><td><?php echo $row5[tb_tn];?></td></tr>  <tr><td>อำเภอ : </td><td><?php echo $row5[ap_tn];?></td></tr>  <tr><td>จังหวัด : </td><td><?php echo $row5[pv_tn];?></td></tr>  </table>").addTo(map);
        

            <?php } ?>

  

    // control that shows state info on hover
    var info = L.control({position: 'bottomright'});

    info.onAdd = function (map) {
    	this._div = L.DomUtil.create('div', 'info');
    	this.update();
            return this._div;
    };


    info.update = function (props) {
        this._div.innerHTML = '<h5>จำนวนการแจ้ง</h5>' +  (props ?
            '<b><center>' + props.prov_nam_t + '</b><br />' + props.value + ' แห่ง'
             : '');
    };
    info.addTo(map);

        // get color depending on population PROV_CODE value
    function getColor(d) {
		return d > 100 ? '#800026' :
				d > 50  ? '#BD0026' :
		        d > 20  ? '#E31A1C' :
		        d > 10  ? '#FC4E2A' :
		        d > 5   ? '#FD8D3C' :
		        d > 2   ? '#FEB24C' :
		        d > 1   ? '#FED976' :
		                   '#FFEDA0';
		}

    function style(feature) {
        return {
            weight: 2,
            opacity: 1,
            color: 'black',
            dashArray: '2',
            fillOpacity: 0.5,
            fillColor: getColor(feature.properties.value_sum)
            };
    }

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 5,
                color: 'white',
                dashArray: '',
                fillOpacity: 0.2
            });

            if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                layer.bringToFront();
            }

            info.update(layer.feature.properties);
        }

        var geojson;

        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            info.update();
        }

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
             var popupContent = '<b>จังหวัด ' + feature.properties.prov_nam_t + '</b><br>' + feature.properties.value_sum + ' จุด' ;
             //console.log(feature);
             layer.bindPopup(popupContent);
             layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
				click : zoomToFeature
            });
        }

        geojson = L.geoJson(OBECData, {
            style: style,
            onEachFeature: onEachFeature
        });

        // add control layers
        var baseLayers = {
	        "แผนที่ขาวดำ": grayscale,
	        "แผนที่ถนน(OSM)": streets,
	        "แผนที่ถนน(GoogleMaps)": roads,
	        "แผนที่ภาพดาวเทียม": satellite,
	        "แผนที่ภูมิประเทศ": terrain.addTo(map),
	    };

	    var overlays = {
	    	"ตำแหน่งเกิดเหตุ": fireReport.addTo(map),
	        "ขอบเขตการปกครอง": geojson.addTo(map)
	    };

	    L.control.layers(baseLayers, overlays).addTo(map);

	    // add legend
        var legend = L.control({position: 'bottomleft'});
        legend.onAdd = function (map) {
                var div = L.DomUtil.create('div', 'info legend'),
                    grades = [0, 1, 2, 5, 10, 20, 50, 100],
                    labels = [],
                    from, to;


            for (var i = 0; i < grades.length; i++) {
                from = grades[i];
                to = grades[i + 1] - 1;

                labels.push(
                    '<i style="background:' + getColor(from + 1) + '"></i> ' +
                    from + (to ? '&ndash;' + to : '+')+ ' แห่ง'
                );
            }

            div.innerHTML = labels.join('<br>');
            return div;
        };
        legend.addTo(map);
    </script>

</html>
