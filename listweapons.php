<?php
$link = mysql_connect('3kdb.darlingdisaster.com', 'phoenixsoap', 'powerme')
    or die('Could not connect');
mysql_select_db('3kingdoms') or die('Could not select database');
mysql_query("SET NAMES utf8");

$resource = mysql_query('select * from weapon ' . $weaponwhere . 'ORDER BY knight_rating DESC') or die ("ERROR: weapon data lookup failed [list.php]");
require 'evaluationtemplate.inc';
?>
<br><br>

<table class="sortable" summary="weapon Listing" width="100%" border-style="hidden" border-collapse="collapse" border-width=1px border-spacing=2px border-color="white" border-style="dotted">
	<tr>
		<th width="37%">Name</th>
		<th>Type</th>
		<th>Knight</th>
		<th>Pri</th>
		<th>Sec</th>
		<th>Bard</th>
		<th>Total</th>
		<!--<th>Phys</th>-->
		<th>E</th>
		<th>B</th>
		<th>F</th>
		<th>I</th>
		<th>A</th>
		<th>E</th>
		<th>M</th>
		<th>E</th>
		<th>P</th>
		<th>R</th>
		<th>Notes</th>
		<th></th>
	</tr>
<?php
while ($weapons = mysql_fetch_assoc($resource)) { ?>	<tr>
		<td><a href="/library/viewweapon.php?weaponID=<?php echo urlencode($weapons['weaponID']); ?>"><?php echo $weapons['name']; ?></a></td>
		<td><?php echo $weapons['type']; ?></center></td>
		<td><?php echo knight_weapon_scale($weapons['knight_rating']);?></center></td>
		<td><center><?php echo $weapons['knight_primary'];?></center></td>
		<td><center><?php echo $weapons['knight_secondary'];?></center></td>
		<td><center><?php echo bard_weapon_scale($weapons['bard_overall'])?></center></td>
		<td><center><?php echo bard_weapon_scale($weapons['bard_edged']) + bard_weapon_scale($weapons['bard_blunt']) + bard_weapon_scale($weapons['bard_fire']) + bard_weapon_scale($weapons['bard_ice']) + bard_weapon_scale($weapons['bard_acid']) + bard_weapon_scale($weapons['bard_electric']) + bard_weapon_scale($weapons['bard_mind']) + bard_weapon_scale($weapons['bard_power']) + bard_weapon_scale($weapons['bard_poison']) + bard_weapon_scale($weapons['bard_radiation']); ?></center></td>
		<!--<td><center><?php echo bard_weapon_scale($weapons['bard_edged']) + bard_weapon_scale($weapons['bard_blunt']); ?></center></td>-->
		<td><center><font color="005959"><?php echo bard_weapon_scale($weapons['bard_edged']); ?></center></td>
		<td><center><font color="424242"><?php echo bard_weapon_scale($weapons['bard_blunt']); ?></center></td>
		<td><center><font color="570000"><?php echo bard_weapon_scale($weapons['bard_fire']); ?></center></td>
		<td><center><font color="5555FF"><?php echo bard_weapon_scale($weapons['bard_ice']); ?></center></td>
		<td><center><font color="NaNNaNBB00"><?php echo bard_weapon_scale($weapons['bard_acid']); ?></center></td>
		<td><center><font color="737300"><?php echo bard_weapon_scale($weapons['bard_electric']); ?></center></td>
		<td><center><font color="800080"><?php echo bard_weapon_scale($weapons['bard_mind']); ?></center></td>
		<td><center><font color="BF40BF"><?php echo bard_weapon_scale($weapons['bard_energy']); ?></center></td>
		<td><center><font color="008000"><?php echo bard_weapon_scale($weapons['bard_poison']); ?></center></td>
		<td><center><font color="00BBBB"><?php echo bard_weapon_scale($weapons['bard_radiation']); ?></center></td>
		<td><center><?
		preg_match('/wordpress_logged_in_[0-9a-z]+=([A-Za-z0-9]+)%/', $_SERVER["HTTP_COOKIE"], $matches);
            if ($matches[1]) { ?>
		<a href="/library/secure/editweapon.php?weaponID=<?php echo urlencode($weapons['weaponID']); ?>">[edit]</a>
		<? } ?></center></td>
	</tr><?php } ?>
</table>