<?php
$conn=mysql_connect(localhost,root,apmsetup);

$sql_common="from acc a, car2 c2";
$sql_connect="where a.AccDate=c2.StartCarDay
				and a.AccLatitude=c2.Latitude
				and a.AccLongitude=c2.Longitude
				and a.AccHour=c2.StartCarHour";

$sql= "select CarID
{$sql_common}
{$sql_connect}";
$result=mysql_query($sql, $conn);
$row=mysql_fetch_array($result);
echo $row;
?>