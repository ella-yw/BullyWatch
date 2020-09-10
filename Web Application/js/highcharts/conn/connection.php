<?php
$con = mysqli_connect('localhost','root','rashmiom', 'highchart');


if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("db_highcharts", $con);


?>