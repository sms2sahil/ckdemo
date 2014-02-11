<?php


require("db_connection.php");


$sq="select * from user_details where id = '".$_GET['id']."'";

$res = mysql_query($sq) or die(mysql_error());

$str = "";

while($row = mysql_fetch_array($res))
{
	
	

	$str.="<tr>";	
		
	$str.="<td>";
	$str.="Name: ";
	$str.="</td>";
		
	$str.="<td>";
	$str.=$row['user_name'];
	$str.="</td>";

	$str.="</tr>";

	$str.="<tr>";	
		
	$str.="<td>";
	$str.="Dept: ";
	$str.="</td>";
		
	$str.="<td>";
	$str.=$row['user_dept'];
	$str.="</td>";

	$str.="</tr>";

	$str.="<tr>";	
		
	$str.="<td>";
	$str.="Desc: ";
	$str.="</td>";
		
	$str.="<td>";
	$str.=$row['user_desc'];
	$str.="</td>";

	$str.="</tr>";


	$str.="<tr>";
	$str.="<td colspan='2'>";
	$str.="<a href='content_editor.php?id=".$row['id']."'>Edit</a>";
	$str.="</td>";
	$str.="</tr>";


	
}



?>

<html>
<head>
<body>
<a href="content_list.php">Back</a>

<table border="1" width="400px" align="center">
<?php

echo $str;
?>

</table>

</body>
</html>