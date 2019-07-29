<?php
include('../../../libs/config_omfs.php');

	
				$status_fire = $_GET['status_fire'];
				$id = $_GET['id'];
				


				$sql2 = "update  fire_status  set  
				status = '$status_fire' 
				where gid =  $id;"; 

				$result = pg_query($db,$sql2);


	header("Location: ../p-status-fire.php");
	
?>