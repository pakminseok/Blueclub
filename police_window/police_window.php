<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.table{
	padding:10px 10px 10px;
	border:1px solid #DEDEDE;
	}
.table h3 {padding:20px 0; font-family:"Noto Sans KR"; font-size:26px; font-weight:600; }
.ttt{display:inline-block;margin:0 0 0 3px;font-weight:bold}
.ttt thead th {padding:12px 0;border-top:1px solid #d1dee2;border-bottom:1px solid #d1dee2;background:#e5ecef;
color:#383838;font-size:0.95em;text-align:center;letter-spacing:-0.1em}
.ttt thead a {color:#383838}
.ttt thead th input {vertical-align:top}
.ttt tbody td {padding:10px 0;border-top:1px solid #c1d1d5;border-bottom:1px solid #c1d1d5; text-align:center}
.ttt tbody th {padding:8px 0;border-top:1px solid #e9e9e9;border-bottom:1px solid #e9e9e9}
.ttt {padding:8px 5px;border-top:1px solid #e9e9e9;border-bottom:1px solid #e9e9e9;word-break:break-all}
</style>
<title>Police Server</title>
</head>


<?php
/*if(!$mbid){
	$mbid = $member[mb_id];
}elseif($mbid != $member[mb_id]){
	alert("잘못된 요청입니다.");
}*/

$conn = mysql_connect('localhost', 'root', 'apmsetup');

mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");

mysql_select_db ('hackathon', $conn);

$sql = "select *
        from acc
		where 1";
		
$result=mysql_query($sql, $conn);
$count=mysql_num_rows($result);
?>

<div class="table">
				<h1>신고된 사고 정보입니다.</h1>
				<p class=""></p>
				<table class="ttt">
					<colgroup>
						<col style="width:300px;" />
						<col style="width:150px;"/>
						<col style="width:80px;" />
						<col style="width:100px;" />
						<col style="width:80px;" />
						<col style="width:80px;"/>
						<col style="width:100px;" />
						<col style="width:100px;" />
						<col style="width:100px;" />
					</colgroup>
					<thead>
						<tr>
							<th scope="col">차량아이디</th>
							<th scope="col">사고대상</th>
							<th scope="col">사고위치</th>
							<th scope="col">사고시간</th>
							<th scope="col">도로종류</th>
							<th scope="col">도로경사</th>
							<th scope="col">광역시/도</th>
							<th scope="col">시/군/구</th>
							<th scope="col">모델 년식, 모델코드</th>
							<th scope="col">신고여부</th>
						</tr>
					</thead>
					<tbody>
					<?php for($i=0; $row=mysql_fetch_array($result); $i++){ ?>
						<tr>
							<td><?php echo $row[CarID];?></td>
							<td><?php echo $row[OppositeValue];?></td>
							<td><?php echo $row[AccLatitude];?> , <?php echo $row[AccLongitude];?></td>
							<td><?php echo $row[AccDate]?></br> <?php echo $row[AccHour];?>: <?php echo $row[AccMinute];?>: <?php echo $row[AccSeconds];?></td>
							<td><?php echo $row[Road];?></td>
							<td><?php echo $row[RoadSlope];?></td>
							<td><?php echo $row[City];?></td>
							<td><?php echo $row[Town];?></td>
							<td><?php echo $row[ModelCode];?>,<?php echo $row[ModelYear];?></td>
							<td><?php if($row[report]=="no"&& $row[CarID]==$row[CarID]) {?><a href="<?php echo $row[video];?>"> <?php echo 사고동영상보기;?></a></br>
							<?php }?>
							<?php echo $row[report]; ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<?php if($i==0){?>
				<div class="empty_item">
					<p>사고신고가 없습니다.</p> 
				</div>
				<?php } ?>
			</div>
