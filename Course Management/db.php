<?php
	$con = mysql_connect('localhost', 'root', '');
	if(!$con) die('Error connecting database');
	mysql_select_db('midtrm', $con);
?>