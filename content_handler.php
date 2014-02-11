<?php


echo "<pre>";

print_r($_POST);
echo "</pre>";


require("db_connection.php");


if(isset($_POST['user_id']) && $_POST['user_id'] > 0)
{
$sq="update user_details set `user_name` = '".addslashes($_POST['user_name'])."',`user_dept` = '".$_POST['user_dept']."',`user_desc` = '".addslashes($_POST['user_desc'])."' ,`ip_addr` ='".$_SERVER['REMOTE_ADDR']."' where id='".$_POST['user_id']."'";

mysql_query($sq) or die(mysql_error());
header("Location: content_list.php");

}
else
{

$sq="insert into user_details (`user_name`,`user_dept`,`user_desc`,`ip_addr`) values ('".addslashes($_POST['user_name'])."','".$_POST['user_dept']."','".addslashes($_POST['user_desc'])."','".$_SERVER['REMOTE_ADDR']."')";

mysql_query($sq) or die(mysql_error());

$last_id= mysql_insert_id();

if($last_id>0)
	header("Location: content_list.php");

}







?>