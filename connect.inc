<?php
$link = mysql_connect('3kdb.darlingdisaster.com', 'phoenixsoap', 'powerme')
    or die('Could not connect');
mysql_select_db('3kingdoms') or die('Could not select database');
mysql_query("SET NAMES utf8");

$resource = mysql_query('select * from armour ' . $armourwhere . 'ORDER BY necromancer_overall') or die ("ERROR: armour data lookup failed [list.php]");
?>