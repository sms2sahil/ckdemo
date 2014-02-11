<?php


require("db_connection.php");


$sq="select * from user_details";

$res = mysql_query($sq) or die(mysql_error());
$str="";
while($row = mysql_fetch_array($res))
{

	//print_r($row);

	$str.="<tr>";
	$str.="<td>";
	$str.=$row['id'];
	$str.="</td>";

	$str.="<td>";
	$str.=$row['user_name'];
	$str.="</td>";

	$str.="<td>";
	$str.=$row['user_dept'];
	$str.="</td>";

	$str.="<td>";
	$str.=$row['user_desc'];
	$str.="</td>";

	$str.="<td>";
	$str.="<a href='content_editor.php?id=".$row['id']."'>EDIT</a>";
	$str.="</td>";

	$str.="<td>";
	$str.="<a href='content_view.php?id=".$row['id']."'>VIEW</a>";
	$str.="</td>";

	$str.="</tr>";
}



?>
<html>
<head>
<body>
<a href="content_editor.php">Add</a>
<table border="1" >
<?php
echo $str;
?>
</table>

</body>
</html>