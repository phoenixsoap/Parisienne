<?php 

$link = mysql_connect('3kdb.darlingdisaster.com', 'phoenixsoap', 'powerme')
    or die('Could not connect');
mysql_select_db('3kingdoms') or die('Could not select database');
mysql_query("SET NAMES utf8");

$resource = mysql_query('SELECT armourID, creator, modified from armour;');
while ($data = mysql_fetch_assoc($resource)) {
echo $query2 = "UPDATE armour where armourID=" . $data['armourID'] . ' set created=("'. $data['modified'] . '");';
mysql_unbuffered_query($query2);
}




?>