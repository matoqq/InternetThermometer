<?php

	include("connect.php"); 	
	
	$link=Connection();

	$result=mysql_query("SELECT * FROM sensors_table",$link);
?>

<html>
   <head>
      <title>Sensor Data</title>
   </head>
<body>
   <h1>Temperature / moisture sensor readings</h1>

   <table border="1" cellspacing="1" cellpadding="1">
		<tr>
			<td>&nbsp;Timestamp&nbsp;</td>
			<td>&nbsp;Temperature 1&nbsp;</td>
			<td>&nbsp;Moisture 1&nbsp;</td>
		</tr>

      <?php 
		  if($result!==FALSE){
		     while($row = mysql_fetch_array($result)) {
		        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
		           $row["time"], $row["temperature1"], $row["humidity1"]);
		     }
		     mysql_free_result($result);
		     mysql_close();
		  }
      ?>

   </table>
</body>
</html>
