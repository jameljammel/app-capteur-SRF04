<?php

// Initialize variable for database credentials
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'sensor';

//Create database connection
  $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

//Check connection was successful
  if ($dblink->connect_errno) {
     printf("Failed to connect to database");
     exit();
  }

//Fetch 3 rows from actor table
  $result = $dblink->query('
SELECT sensors_distance_data,
sensors_data_time
FROM tbl_sensors_data
ORDER BY sensors_data_date DESC, sensors_data_time DESC
LIMIT 5
');

$jsonData = array(
    'tag' => 'data',
    'error' => 'false',
    'data' => array(),
);

//Initialize array variable
  $dbdata = array();

//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {
	$jsonData['data'][] = array(
        'sensors_distance_data' => $row['sensors_distance_data'],
        'sensors_data_time'  => $row['sensors_data_time'],
    );
  }

echo json_encode($jsonData);
//Print array in JSON format
 //echo json_encode($dbdata);
 
?>
