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


	
</head>
<body>

    
        <div class="content">
            <div class="container-fluid">
                <div class="row">
				<br>
			<div class="col-md-8">
                        <div class="card">
                               <iframe src="map_hotspot.php?show_point=1" name="map_fire" frameborder="0" width="100%" height="670px"></iframe>
                            
                        </div>
                    </div>
					
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">เลือกข้อมูล</h4>
                            </div>
                            <div class="content">
                                <form action="map_hotspot.php" target="map_fire" name="form1">
                                 <div class="form-group">
                                                <label class="col-md-12">จังหวัด</label>
                                            <span id="prov_name">
                                                <select class="form-control" id="select" name="prov_name" >
                                                   <option value=''>- - เลือกทั้งหมด - - </option>
                                                </select>
                                            </span>
                                            </div>
                                 <div class="form-group">
                                                <label class="col-md-12">อำเภอ</label>
                                            <span id="amphoe_name">
                                                <select class="form-control" id="select" name="amphoe_name" >
                                                   <option value=''>- - เลือกทั้งหมด - - </option>
                                                </select>
                                            </span>
                                            </div>
                                 <div class="form-group">
                                                <label for="exampleInputPassword1">ตำบล</label>
                                            <span id="tambon_name">
                                                <select class="form-control" id="select" name="tambon_name" >
                                                   <option value=''>- - เลือกทั้งหมด - - </option>
                                                </select>
                                            </span>
                                            </div>
                                 <div class="form-group">
                                      <label for="exampleSelect2">ช่วงเวลาเริ่มต้น</label>
                                            <input type="date" class="form-control" id="myDate1" value="2018-01-01" onChange="this.form.submit();" name="date_start">
                                    </div>
                                 <div class="form-group">
                                      <label for="exampleSelect2">ช่วงเวลาสิ้นสุด</label>
                                            <input type="date" class="form-control" id="myDate2" value="2018-02-01" onChange="this.form.submit();" name="date_end">
                                    </div>


                                 <div class="form-group">
                                      <label for="exampleSelect2">ดาวเทียม</label>
                                      <select  class="form-control" id="exampleSelect2" name="satte" onChange="this.form.submit();">
                                        <option>Terra</option>
                                        <option>Aqua</option>
                                      </select>
                                    </div> <hr> 
                                 <label class="checkbox">
                                   <input type="checkbox" data-toggle="checkbox" value="1" name="show_point"  onChange="this.form.submit();"  checked="">
                                        แสดงจุดตำแหน่งการเผา
                                 </label>
                                </form>	
								
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


<script>
function myFunction() {
    document.getElementById("myDate1").defaultValue = "2018-01-01";
    document.getElementById("myDate2").defaultValue = "2018-02-01";
}
</script>

</html>
