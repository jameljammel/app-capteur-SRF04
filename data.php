<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "sensor");

$result = mysqli_query($connect, '
SELECT sensors_distance_data,
UNIX_TIMESTAMP(CONCAT_WS(" ", sensors_data_date, sensors_data_time)) AS datetime
FROM tbl_sensors_data
ORDER BY sensors_data_date DESC, sensors_data_time DESC
LIMIT 20
');


$rows = array();
$table = array();

$table['cols'] = array(
 array(
  'label' => 'Date Time',
  'type' => 'datetime'
 ),
 array(
  'label' => 'Distance en (CM)',
  'type' => 'number'
 )
);

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $datetime = explode(".", $row["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
 $sub_array[] =  array(
      "v" => $row["sensors_distance_data"]
     );
 $rows[] =  array(
     "c" => $sub_array
    );
}
$table['rows'] = $rows;
$jsonTable = json_encode($table);
echo $jsonTable;

?>