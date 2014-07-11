<?php
include 'settings.php';
$link = mysql_connect('3kdb.darlingdisaster.com', 'phoenixsoap', 'powerme')
    or die('Could not connect');
mysql_select_db('3kingdoms') or die('Could not select database');
mysql_query("SET NAMES utf8");

include_once '/home/phoenixsoap/3k/docs/library/secure/parent.class.inc';
$parent = new Parental;

$resource = mysql_query('select * from armour WHERE armourID="' . $_GET['armourID'] . '"' . $armourwhere . 'ORDER BY necromancer_overall') or die ("ERROR: armour data lookup failed [list.php]");
require 'evaluationtemplate.inc';

//light blue: 97CDE3 slightly darker: #78A2B3 red: E50000
function printbool ($variable) {
    print ($variable) ? '<font color="#557480">yes</font>' : ' no ';
}

$armours = mysql_fetch_assoc($resource);
include 'koifakeheader.inc'; ?>
<h2><?php echo $armours['name']; ?></h2>

<table class="sortable" summary="Armour Listing" width="100%">
	<tr>
		<th> Name </th>
		<th> Type </th>
		<th> Overall </th>
		<th> Total </th>
		<th> Phys </th>
		<th> E </th>
		<th> B </th>
		<th> F </th>
		<th> I </th>
		<th> A </th>
		<th> E </th>
		<th> M </th>
		<th> E </th>
		<th> P </th>
		<th> R </th>
		<th> Notes </th>
	</tr>
	<tr>
		<td> Necromancer </td>
		<td> <?php
		if ($armours['unbreakable'])
		    echo '<font color="4A4031">' . $armours['type'] . '</font>';
		else
		    echo $armours['type']; 
		?> </td>
		<td><center> <?php echo necro_scale($armours['necromancer_overall'])?></center> </td>
		<td><center> <?php echo necro_scale($armours['necromancer_edged']) + necro_scale($armours['necromancer_crushing']) + necro_scale($armours['necromancer_flame']) + necro_scale($armours['necromancer_cold']) + necro_scale($armours['necromancer_corrosion']) + necro_scale($armours['necromancer_lightning']) + necro_scale($armours['necromancer_psionic']) + necro_scale($armours['necromancer_power']) + necro_scale($armours['necromancer_virulence']) + necro_scale($armours['necromancer_light']); ?></center> </td>
		<td><center> <?php echo necro_scale($armours['necromancer_edged']) + necro_scale($armours['necromancer_crushing']); ?></center> </td>
		<td><center> <font color="005959"><?php echo necro_scale($armours['necromancer_edged']); ?></font></center> </td>
		<td><center> <font color="424242"><?php echo necro_scale($armours['necromancer_crushing']); ?></font></center> </td>
		<td><center> <font color="570000"><?php echo necro_scale($armours['necromancer_flame']); ?></font></center> </td>
		<td><center> <font color="5555FF"><?php echo necro_scale($armours['necromancer_cold']); ?></font></center> </td>
		<td><center> <font color="NaNNaNBB00"><?php echo necro_scale($armours['necromancer_corrosion']); ?></font></center> </td>
		<td><center> <font color="737300"><?php echo necro_scale($armours['necromancer_lightning']); ?></font></center> </td>
		<td><center> <font color="800080"><?php echo necro_scale($armours['necromancer_psionic']); ?></font></center> </td>
		<td><center> <font color="BF40BF"><?php echo necro_scale($armours['necromancer_power']); ?></font></center> </td>
		<td><center> <font color="008000"><?php echo necro_scale($armours['necromancer_virulence']); ?></font></center> </td>
		<td><center> <font color="00BBBB"><?php echo necro_scale($armours['necromancer_light']); ?></font></center> </td>
		<td> <?
		preg_match('/wordpress_logged_in_[0-9a-z]+=([A-Za-z0-9]+)%/', $_SERVER["HTTP_COOKIE"], $matches);
            if ($matches[1]) { ?><a href="/library/secure/editarmour.php?armourID=<?php echo urlencode($armours['armourID']); ?>">[edit]</a><? } ?> </td>
	</tr>
	<tr>
		<td> Knight  </td>
		<td>  </td>
		<td>  </td>
		<td> <?php echo knight_scale($armours['knight_edged']) + knight_scale($armours['knight_blunt']) + knight_scale($armours['knight_fire']) + knight_scale($armours['knight_ice']) + knight_scale($armours['knight_acid']) + knight_scale($armours['knight_electric']) + knight_scale($armours['knight_mind']) + knight_scale($armours['knight_energy']) + knight_scale($armours['knight_poison']) + knight_scale($armours['knight_radiation']); ?> </td>
		<td> <?php echo knight_scale($armours['knight_edged']) + knight_scale($armours['knight_blunt']); ?> </td>
		<td> <?php echo knight_scale($armours['knight_edged']); ?> </td>
		<td> <?php echo knight_scale($armours['knight_blunt']); ?> </td>
		<td> <?php echo knight_scale($armours['knight_fire']); ?> </td>
		<td> <?php echo knight_scale($armours['knight_ice']); ?> </td>
		<td> <?php echo knight_scale($armours['knight_acid']); ?> </td>
		<td> <?php echo knight_scale($armours['knight_electric']); ?> </td>
		<td> <?php echo knight_scale($armours['knight_mind']); ?> </td>
		<td> <?php echo knight_scale($armours['knight_energy']); ?> </td>
		<td> <?php echo knight_scale($armours['knight_poison']); ?> </td>
		<td> <?php echo knight_scale($armours['knight_radiation']); ?> </td>
	</tr>
	<tr>
		<td> Bard Lore </td>
		<td>  </td>
		<td>  </td>
		<td> <?php echo bard_scale($armours['bard_edged']) + bard_scale($armours['bard_blunt']) + bard_scale($armours['bard_fire']) + bard_scale($armours['bard_ice']) + bard_scale($armours['bard_acid']) + bard_scale($armours['bard_electric']) + bard_scale($armours['bard_mind']) + bard_scale($armours['bard_energy']) + bard_scale($armours['bard_poison']) + bard_scale($armours['bard_radiation']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_edged']) + bard_scale($armours['bard_blunt']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_edged']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_blunt']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_fire']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_ice']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_acid']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_electric']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_mind']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_energy']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_poison']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_radiation']); ?> </td>
	</tr>
	<tr>
		<td> Bard Compare </td>
		<td>  </td>
		<td>  </td>
		<td> <?php echo bard_scale($armours['bard_edged_low']) + bard_scale($armours['bard_blunt_low']) + bard_scale($armours['bard_fire_low']) + bard_scale($armours['bard_ice_low']) + bard_scale($armours['bard_acid_low']) + bard_scale($armours['bard_electric_low']) + bard_scale($armours['bard_mind_low']) + bard_scale($armours['bard_energy_low']) + bard_scale($armours['bard_poison_low']) + bard_scale($armours['bard_radiation_low']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_edged_low']) + bard_scale($armours['bard_blunt_low']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_edged_low']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_blunt_low']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_fire_low']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_ice_low']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_acid_low']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_electric_low']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_mind_low']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_energy_low']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_poison_low']); ?> </td>
		<td> <?php echo bard_scale($armours['bard_radiation_low']); ?> </td>
	</tr>
	<tr>
	    <td rowspan=20>
	    
	    
	    
	    </td>
	</tr>
</table>



<?php echo $parent->ptext($armours['description']); ?>

<center><table width="65%">
	<tr>
		<td>Unbreakable: <?php printbool($armours['unbreakable']); ?></td>
		<td>Fake: <?php printbool($armours['real']); ?></td>
		<td>Cursed: <?php printbool($armours['cursed']); ?></td>
	</tr>
	<tr>
		<td>Unique: <?php echo $armours['unique']; ?></td>
		<td>Enchanted: <?php printbool($armours['enchanted']); ?></td>
		<td>No Drop: <?php printbool($armours['no_drop']); ?></td>
	</tr>
	<tr>
		<td>Binding: <?php echo $armours['binding']; ?></td>
		<td>World Drop:	<?php printbool($armours['world_drop']); ?></td>
		<td>No Remove: <?php printbool($armours['no_remove']); ?></td>
	</tr>
</table>
<p>Special Melee Defense: <?php printbool($armours['special_melee_defense']); ?> Damage Reduction: <?php printbool($armours['damage_reduction']); ?></center>
<p><center>Level Requirement: <?php echo $armours['level_requirement']; 

print (!empty($armours['other_requirement'])) ? '<br />Other Requirements: ' . $armours['other_requirement'] : '';

?>	<br />
<?php print (!empty($armours['unidentified'])) ?  'Unidentified Description: ' . $armours['unidentified'] : 'This armour does not need identification'; ?></center></p>	

<p><center><?php print (!empty($armours['strength'])) ?  'Str: ' . $armours['strength'] : ''; ?> <?php print (!empty($armours['dexterity'])) ?  'Dex: ' . $armours['dexterity'] : ''; ?> <?php print (!empty($armours['wisdom'])) ?  'Wis: ' . $armours['wisdom'] : ''; ?> <?php print (!empty($armours['intelligence'])) ?  'Int: ' . $armours['intelligence'] : ''; ?> <?php print (!empty($armours['constitution'])) ?  'Con: ' . $armours['constitution'] : ''; ?> <?php print (!empty($armours['charisma'])) ?  'Cha: ' . $armours['charisma'] : ''; ?><br />

<?php print (!empty($armours['hp_regen'])) ?  'HP Regen: ' . $armours['hp_regen'] : ''; ?> <?php print (!empty($armours['sp_regen'])) ?  'SP Regen: ' . $armours['sp_regen'] : ''; ?></center></p>

<p>Notes:<br />
<?php echo $armours['notes']; ?>

<br />
	<br />
Bard Overall:	<?php echo $armours['bard_overall']; ?>	<br />
Bard Compare:	<?php echo $armours['bard_compare']; ?>	<br />
Bard Special Defense:	<?php echo $armours['bard_specialdefense']; ?>	<br />
Bard Value:	<?php echo $armours['bard_value']; ?>	<br />
Bard Lore:	<font color="005959"><?php echo $armours['bard_lore']; ?></font>

<p><i>Created by <?php

if ('phoenixsoap' == $armours['creator'])
    echo 'Parisienne Fatale';
elseif ('zrcoupe' == $armours['creator'])
    echo 'Decado';
else
    echo $armours['creator'];

?> <?php echo $armours['created']; ?>.<br />
Last modified <?php echo $armours['modified']; ?>.</i></p><?php include 'koifakefooter.inc'; ?>