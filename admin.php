<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
table,td,th{
	border:#6F9 solid 2px;
	}
table{
	width:1110px;
	margin:auto;
	font-size:18px;
	background:#cc99bb;
	}
</style>
</head>

<script type="text/javascript">
function jump(id)
{
	if(confirm('确定要删除吗？'))
	{
		location.href='del.php ? id='+ id ;	
	}	
}
</script>

<body>
<?php
//连接数据库
mysql_connect('localhost','root','') or die(mysql_error);
//选择数据库
mysql_select_db('data0401');
//字符编码
mysql_query('set names utf8');
//选择所有商品
$rs = mysql_query('select * from products order by proid desc');
?>
<table>
	<tr bgcolor="#FFFF33">
    <th>编号</th>
    <th>商品名称</th>
    <th>规格</th>
    <th>价格</th>
    <th>库存量</th>
    <th>图片</th>
    <th>商品详细属性</th>
    <th>修改</th>
    <th>删除</th>
    
<a href="add.php">添加商品</a>
<?php
//循环取出匹配成关联数组
while($rows=mysql_fetch_object($rs)){
	echo '<tr>';
	echo '<td width="60">'.$rows -> proID.'</td>';
	echo '<td width="180">'.$rows -> proname.'</td>';
	echo '<td width="180">'.$rows -> proguide.'</td>';
	echo '<td width="100">'.$rows -> proprice.'</td>';
	echo '<td width="100">'.$rows -> promount.'</td>';
	echo $rows ->proimages =='' ? '<td>图片暂缺</td>' : '<td width="120"><img src="'.$rows ->proimages.'"/></td>';
	echo '<td>'.$rows ->proweb.'</td>';
	echo '<td><input type="button" value="修改" onclick="location.href=\'modify.php?id='.$rows -> proID.'\'"></td>';
	echo '<td><input type="button" value="删除" onclick="jump(' .$rows -> proID.')"/></td>';
	echo '</tr>';
	}
?>

    </tr>
</table>
</body>
</html>