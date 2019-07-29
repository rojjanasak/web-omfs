<?php
include('../../../libs/config_omfs.php');

	
				$id_user = $_GET['id'];

				$sql2 = "UPDATE user_profile
				set pass_user = 'omfs'
				where id_user =  $id_user;"; 

				$result = pg_query($db,$sql2);


		header("Location: ../p-request.php");
	
?>