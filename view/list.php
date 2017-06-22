<!DOCTYPE html>
<html>
	<head> 
		<style type="text/css">
		table.imagetable {
			font-family: verdana,arial,sans-serif;
			font-size:11px;
			color:#333333;
			border-width: 1px;
			border-color: #999999;
			border-collapse: collapse;
		}
		table.imagetable th {
			background:#b5cfd2 url('http://img.my.csdn.net/uploads/201209/08/1347078600_3763.jpg');
			border-width: 1px;
			padding: 8px;
			border-style: solid;
			border-color: #999999;
		}
		table.imagetable td {
			background:#dcddc0 url('http://img.my.csdn.net/uploads/201209/08/1347078645_1925.jpg');
			border-width: 1px;
			padding: 8px;
			border-style: solid;
			border-color: #999999;
		}
		</style>
		<meta charset="UTF-8"> 
		<title>Cashier API</title> 
	</head>
	<body>
		域名:   http://open.m.fy.test1.shopex123.com/cashier
		<table class="imagetable">
			<tr>
				<th>名称</th>
				<th>链接</th>
				<th>状态</th>
				<th>修改时间</th>
			</tr>
		<?php foreach ($list as $api) { ?>
			<tr>
				<td><?php echo $api['name'] ?></td>
				<td><?php echo $api['url'] ?></td>
				<td><?php echo $api['statusName'] ?></td>
				<td><?php echo $api['update_time'] ?></td>
			</tr>
		<?php } ?>
		</table>
	</body>
</html>