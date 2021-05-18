<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$db_server = "localhost";
$db_name = "final_project";
$db_user = "root";
$db_passwd = "";

$db = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
if(mysqli_connect_errno())
  echo "無法連線!" . mysqli_connect_error();

mysqli_set_charset($db, 'utf8');

if(!@mysqli_select_db($db, 'final_project'))
  die("無法使用資料庫!");

?>