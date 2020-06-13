<?php

$db=mysqli_connect('localhost','root','','sensor');

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
function selectfromdb($db,$sql){
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);
return $row;	
}

function insertindb($db,$sql){
mysqli_query($db, $sql);	
}

$datefirst=date('Y-m-d');
$heure=date('h:i:s');


insertindb($db,"insert into tbl_sensors_data values('{$_GET['valeur']}','{$datefirst}','{$heure}');");
//echo "insert into tbl_sensors_data values('{$_GET['valeur']}','{$datefirst}','{$heure}');";

?>