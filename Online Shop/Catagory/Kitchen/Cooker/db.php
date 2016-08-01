<?php
	$con = mysql_connect('localhost', 'root', 'Inaninan0');
	if(!$con) die ("error connecting db");
	mysql_select_db('onlineshop', $con);
?>