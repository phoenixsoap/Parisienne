<?php
$link = mysql_connect('3kdb.darlingdisaster.com', 'phoenixsoap', 'powerme')
    or die('Could not connect');
mysql_select_db('3kingdoms') or die('Could not select database');
mysql_query("SET NAMES utf8");

include_once '/home/phoenixsoap/3k/docs/library/secure/parent.class.inc';
$parent = new Parental;

$resource = mysql_query('select * from weapon WHERE weaponID="' . $_GET['weaponID'] . '"' . $weaponwhere . 'ORDER BY knight_rating DESC') or die ("ERROR: weapon data lookup failed [list.php]");
require 'evaluationtemplate.inc';

$weapons = mysql_fetch_assoc($resource);
include 'koifakeheader.inc'; ?>
<h2><?php echo $weapons['name']; ?></h2>

<table class="sortable" summary="weapon Listing" width="100%">
	<tr>
		<th><small>Name</small></th>
		<th><small>Type</small></th>
		<th><small>Knight</small></th>
		<th><small>Pri</small></th>
		<th><small>Sec</small></th>
		<th><small>Bard<br />Overall</small></th>
		<th><small>Total</small></th>
		<th><small>Phys</small></th>
		<th><small>E</small></th>
		<th><small>B</small></th>
		<th><small>F</small></th>
		<th><small>I</small></th>
		<th><small>A</small></th>
		<th><small>E</small></th>
		<th><small>M</small></th>
		<th><small>E</small></th>
		<th><small>P</small></th>
		<th><small>R</small></th>
		<th><small>Notes</small></th>
		<th></th>
	</tr>
	<tr>
		<td><small><a href="/library/viewweapon.php?weaponID=<?php echo urlencode($weapons['weaponID']); ?>"><?php echo $weapons['name']; ?></a></small></td>
		<td><small><?php
		if ($weapons['unbreakable'])
		    echo '<font color="4A4031">' . $weapons['type'] . '</font>';
		else
		    echo $weapons['type']; 
		?></small></td>
		<td><center><small><?php echo knight_weapon_scale($weapons['knight_rating']);?></small></center></td>
		<td><center><small><?php echo $weapons['knight_primary'];?></small></center></td>
		<td><center><small><?php echo $weapons['knight_secondary'];?></small></center></td>
		<td><center><small><?php echo bard_scale($weapons['bard_overall']);?></small></center></td>
		<td><center><small><?php echo bard_weapon_scale($weapons['bard_edged']) + bard_weapon_scale($weapons['bard_blunt']) + bard_weapon_scale($weapons['bard_fire']) + bard_weapon_scale($weapons['bard_ice']) + bard_weapon_scale($weapons['bard_acid']) + bard_weapon_scale($weapons['bard_electric']) + bard_weapon_scale($weapons['bard_mind']) + bard_weapon_scale($weapons['bard_power']) + bard_weapon_scale($weapons['bard_poison']) + bard_weapon_scale($weapons['bard_radiation']); ?></small></center></td>
		<td><center><small><?php echo bard_weapon_scale($weapons['bard_edged']) + bard_weapon_scale($weapons['bard_blunt']); ?></small></center></td>
		<td><center><small><font color="005959"><?php echo bard_weapon_scale($weapons['bard_edged']); ?></small></center></td>
		<td><center><small><font color="424242"><?php echo bard_weapon_scale($weapons['bard_blunt']); ?></small></center></td>
		<td><center><small><font color="570000"><?php echo bard_weapon_scale($weapons['bard_fire']); ?></small></center></td>
		<td><center><small><font color="5555FF"><?php echo bard_weapon_scale($weapons['bard_ice']); ?></small></center></td>
		<td><center><small><font color="NaNNaNBB00"><?php echo bard_weapon_scale($weapons['bard_acid']); ?></small></center></td>
		<td><center><small><font color="737300"><?php echo bard_weapon_scale($weapons['bard_electric']); ?></small></center></td>
		<td><center><small><font color="800080"><?php echo bard_weapon_scale($weapons['bard_mind']); ?></small></center></td>
		<td><center><small><font color="BF40BF"><?php echo bard_weapon_scale($weapons['bard_magical']); ?></small></center></td>
		<td><center><small><font color="008000"><?php echo bard_weapon_scale($weapons['bard_poison']); ?></small></center></td>
		<td><center><small><font color="00BBBB"><?php echo bard_weapon_scale($weapons['bard_radiation']); ?></small></center></td>
		<td><center><small><?
		preg_match('/wordpress_logged_in_[0-9a-z]+=([A-Za-z0-9]+)%/', $_SERVER["HTTP_COOKIE"], $matches);
            if ($matches[1]) { ?><a href="/library/secure/editweapon.php?weaponID=<?php echo urlencode($weapons['weaponID']); ?>">[edit]</a><? } ?></small></center></td>
	</tr>
</table>

<?php 
//light blue: 97CDE3 slightly darker: #78A2B3 red: E50000
function printbool ($variable) {
    print ($variable) ? '<font color="#557480">yes</font>' : '<small>no</small>';
}



?>

<br /><?php echo $parent->ptext($weapons['description']); ?>

<center><table width="65%">
	<tr>
		<td>Unbreakable: <?php printbool($weapons['unbreakable']); ?></td>
		<td>Fake: <?php printbool($weapons['real']); ?></td>
		<td>Cursed: <?php printbool($weapons['cursed']); ?></td>
	</tr>
	<tr>
		<td>Unique: <?php echo $weapons['unique']; ?></td>
		<td>Enchanted: <?php printbool($weapons['enchanted']); ?></td>
		<td>No Drop: <?php printbool($weapons['no_drop']); ?></td>
	</tr>
	<tr>
		<td>Binding: <?php echo $weapons['binding']; ?></td>
		<td>World Drop:	<?php printbool($weapons['world_drop']); ?></td>
		<td>No Remove: <?php printbool($weapons['no_remove']); ?></td>
	</tr>
</table>
<p>Exceptionally Balanced: <?php printbool($weapons['exceptionally_balanced']); ?> Damage Reduction: <?php printbool($weapons['damage_reduction']); ?><br />Non-Standard Damage Range: <?php printbool($weapons['non_standard_damage']); ?><?php print (!empty($weapons['penetration'])) ?  ' Penetration: ' . $weapons['penetration'] : ''; ?><br />
Two Handed: <?php printbool($weapons['two_handed']); ?> Reflection: <?php printbool($weapons['reflect']); ?> Honed: <?php printbool($weapons['honed']); ?><?php print (!empty($weapons['light'])) ?  ' +Light: ' . $weapons['light'] : ''; ?></center>
<p><center>Level Requirement: <?php echo $weapons['level_requirement']; 

print (!empty($weapons['other_requirement'])) ? '<br />Other Requirements: ' . $weapons['other_requirement'] : '';

?>	<br />
<?php print (!empty($weapons['unidentified'])) ?  'Unidentified Description: ' . $weapons['unidentified'] : 'This weapon does not need identification'; ?></center></p>	

<p><center><?php print (!empty($weapons['strength'])) ?  'Str: ' . $weapons['strength'] : ''; ?> <?php print (!empty($weapons['dexterity'])) ?  'Dex: ' . $weapons['dexterity'] : ''; ?> <?php print (!empty($weapons['wisdom'])) ?  'Wis: ' . $weapons['wisdom'] : ''; ?> <?php print (!empty($weapons['constitution'])) ?  'Con: ' . $weapons['constitution'] : ''; ?> <?php print (!empty($weapons['charisma'])) ?  'Cha: ' . $weapons['charisma'] : ''; ?><br />

<?php print (!empty($weapons['hp_regen'])) ?  'HP Regen: ' . $weapons['hp_regen'] : ''; ?> <?php print (!empty($weapons['sp_regen'])) ?  'SP Regen: ' . $weapons['sp_regen'] : ''; ?></center></p>

<p>Notes:<br />
<?php echo $weapons['notes']; ?>

<br />
	<br />
Bard overall rating:	<?php echo $weapons['bard_overall']; ?>	<br />
Bard Special Attacks or Powers:	<?php printbool($weapons['bard_special_power']); ?>	<br />
Bard Value:	<?php echo $weapons['bard_value']; ?>	<br />
Bard Lore:	<font color="005959"><?php echo $weapons['bard_lore']; ?></font>

<p><i>Created by <?php

if ('phoenixsoap' == $weapons['creator'])
    echo 'Parisienne Fatale';
elseif ('zrcoupe' == $armours['creator'])
    echo 'Decado';
else
    echo $weapons['creator'];

?> <?php echo $weapons['created']; ?>.<br />
Last modified <?php echo $weapons['modified']; ?>.</i></p><?php include 'koifakefooter.inc'; ?>