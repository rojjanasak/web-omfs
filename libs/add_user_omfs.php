<?php
header("Access-Control-Allow-Origin: *");

header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');


$hostname_db = "119.59.125.191";
$database_db = "omfs";
$username_db = "postgres";
$password_db = "##firehp@postgis##";

$link = pg_connect("host=$hostname_db user=$username_db password=$password_db dbname=$database_db") or die("Can't Connect Server");

pg_query("SET client_encoding = 'utf-8'"); 



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// get post body content
$content = file_get_contents('php://input');
// parse JSON
$user = json_decode($content, true);

$name_user = $user['name_user'];
$lname_user = $user['lname_user'];
$tel_user = $user['tel_user'];
$prov_user = $user['prov_user'];
$amp_user = $user['amp_user'];
$tam_user = $user['tam_user'];
$email_user = $user['email_user'];
$pass_user = $user['pass_user'];
$level_user = $user['level_user'];
$iden_number = $user['iden_number'];  
$img64 = $user['img64'];  

//check duplicate $email_user
$sql2 = "SELECT * FROM user_profile WHERE iden_number = '$iden_number' ";
$result2 = pg_query($link, $sql2);
$rowcount = pg_num_rows($result2);
if ($rowcount == 1) {
echo json_encode(['status' => 'error','message' => 'error-email']);

exit;
} 
		
$sql = "INSERT INTO user_profile (name_user, lname_user, tel_user , prov_user, amp_user, tam_user, pic_user, email_user, pass_user ,level_user,status_user,iden_number) 
VALUES ('$name_user', '$lname_user', $tel_user, '$prov_user', '$amp_user', '$tam_user','$img64', '$email_user', '$pass_user', '$level_user', 'register_app', '$iden_number');";

$result = pg_query($link, $sql);



if ($result) {
echo json_encode(['status' => 'ok','message' => 'success']);
} else {
echo json_encode(['status' => 'error','message' => 'error-other']);
}
}


pg_close($link);


?>