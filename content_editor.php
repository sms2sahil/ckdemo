<?php
error_reporting(E_ALL);
require("db_connection.php");

$dep = ['IT','HR','ADMIN','ACCOUNTS'];

if(isset($_GET['id']))
{
	$sq="select * from user_details where id = '".$_GET['id']."'";
	$res = mysql_query($sq) or die(mysql_error());
	$row = mysql_fetch_array($res);
	extract($row);
	$button="Update";
}
else
{
	$id = "";
	$user_name = "";
	$user_dept = "";
	$user_desc = "";
	$button="Insert";

	
}

$opt = generate_combo($dep,$user_dept);

function generate_combo($dep,$user_dept)
{
	$s = "";
	for($i=0;$i<count($dep);$i++)
	{
		if($dep[$i] == $user_dept)
			$sel = "selected='selected'";
		else
			$sel = "";
		$s.="<option value='".$dep[$i]."' ".$sel.">".$dep[$i]."</option>";

	}
	return $s;
}



?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> CKDemo List </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">

  <script src="ckeditor/ckeditor.js"></script>
    <script src="ckeditor/config.js"></script>
	<link rel="stylesheet" href="ckeditor/samples/sample.css">


<script>
    
</script>

 </head>

 <body>
	
	<a href="content_list.php">List</a>
	<form method="post" action="content_handler.php">
		<table border="1">
			<tr>
				<td>
					Name:
				</td>
				<td>
					<input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?>" />
				</td>
			</tr>
			<tr>
				<td>
					Dept: 
				</td>
				<td>
					<select name="user_dept" id="user_dept">
						<?php
							echo $opt;
						?>
					</select>   
				</td>
			</tr>
			<tr>
				<td>
					Desc: 
				</td>
				<td>
					<textarea class="ckeditor" cols="80" id="user_desc" name="user_desc" rows="10">
						<?php
							echo $user_desc;
						?>
					</textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="hidden" name="user_id" value="<?php echo $id; ?>" />
					<input type="submit" name="bsub" value="<?php echo $button; ?>" />
				</td>
			</tr>
		</table>	
	</form>
 </body>
</html>
