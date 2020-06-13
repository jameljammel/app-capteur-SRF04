<html>
 <head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript">
  
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart()
   {	
   var data;
   
   function getData(){
	   
	   var json = $.ajax({
            url: 'http://localhost/sensor/data.php', // make this url point to the data file
            dataType: 'json',
            async: false
        }).responseText;

     data= new google.visualization.DataTable(json);
	 chart.draw(data, options); 
   }
    

    var options = {
     title:'DISTANCE EN CM EN FONCTION DU TEMPS',
     legend:{position:'bottom'},
     chartArea:{width:'95%', height:'80%'}
    };

    var chart = new google.visualization.LineChart(document.getElementById('line_chart'));
	getData();
	setInterval(getData, 1000);
   }
  </script>
  <style>
  .page-wrapper
  {
   width:1300px;
   margin:0 auto;
  }
  </style>
 </head>  
 <body style="background-image:url('1.jpg');background-size: cover; background-repeat: no-repeat; background-attachment:fixed;">
 <?php
function insertindb($db,$sql){
mysqli_query($db, $sql);	
}
$db=mysqli_connect('localhost','root','','sensor');
insertindb($db,'delete from tbl_sensors_data;');

?>
  <div class="page-wrapper">
   <br />
   <h1 align="center" style="background-color:#FFFFFF;text-color:#FFFFFF;">
   <span style="color: #0000FF">Graphe en temps réel de la distance prise à partir d'un capteur sonor virtuel</span>
   </h1>
   <div id="line_chart" style="width: 100%; height: 80%"></div>
  </div>
  
  <form action="" method="post" name="login">
  <br>
  <center><input name="submit" type="submit" value="Réinitialiser" />
  </form>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
 </body>
</html>
