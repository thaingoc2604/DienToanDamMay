<?php
	$dbhost = '';
	$dbname = '';
	$dbuser = '';
	$dbpass = '';
	
	$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if($link)
	{
		mysqli_set_charset($link, 'utf8');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	else
		echo 'Không thể kết nối đến server!';
?>