<?php
$link = mysql_connect('3kdb.darlingdisaster.com', 'phoenixsoap', 'powerme')
    or die('Could not connect');
mysql_select_db('3kingdoms') or die('Could not select database');
mysql_query("SET NAMES utf8");

if (isset($_GET['type']))
    $armourwhere = 'WHERE type=("' . $_GET['type'] . '") ';
$query = 'select *, (necromancer_edged+necromancer_crushing+necromancer_flame+necromancer_cold+necromancer_corrosion+necromancer_lightning+necromancer_psionic+necromancer_power+necromancer_virulence+necromancer_light) AS total, (necromancer_edged+necromancer_crushing) AS physical from armour ' . $armourwhere . 'ORDER BY necromancer_overall DESC, total DESC, bard_overall DESC, bard_compare DESC, physical DESC';

$resource = mysql_query($query) or die ("ERROR: armour data lookup failed [list.php]");
require_once 'evaluationtemplate.inc';
?>
<br><br>

<table class="sortable" summary="Armour Listing" width="100%">
	<tr>
		<th width="37%">Name</th>
		<th>Type</th>
		<th>Nec</th>
		<th>Total</th>
		<th>Phys</th>
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
		<th>Bard</th>
		<th>Comp</th>
		<th>Notes</th>
		<th></th>
	</tr>
<?php
while ($armours = mysql_fetch_assoc($resource)) { ?>	<tr>
		<td><a href="/library/view.php?armourID=<?php echo urlencode($armours['armourID']); ?>"><?php echo $armours['name']; ?></a></td>
		<td><?php
		if ($armours['unbreakable'])
		    echo '<font color="4A4031">' . $armours['type'] . '</font>';
		else
		    echo $armours['type']; 
		?></td>
		<td><center><?php echo necro_scale($armours['necromancer_overall'])?></center></td><td><center><?php echo necro_scale($armours['necromancer_edged']) + necro_scale($armours['necromancer_crushing']) + necro_scale($armours['necromancer_flame']) + necro_scale($armours['necromancer_cold']) + necro_scale($armours['necromancer_corrosion']) + necro_scale($armours['necromancer_lightning']) + necro_scale($armours['necromancer_psionic']) + necro_scale($armours['necromancer_power']) + necro_scale($armours['necromancer_virulence']) + necro_scale($armours['necromancer_light']); ?></center></td>
		<td><center><?php echo necro_scale($armours['necromancer_edged']) + necro_scale($armours['necromancer_crushing']); ?></center></td>
		<td><center><font color="005959"><?php echo necro_scale($armours['necromancer_edged']); ?></font></center></td>
		<td><center><font color="424242"><?php echo necro_scale($armours['necromancer_crushing']); ?></font></center></td>
		<td><center><font color="570000"><?php echo necro_scale($armours['necromancer_flame']); ?></font></center></td>
		<td><center><font color="5555FF"><?php echo necro_scale($armours['necromancer_cold']); ?></font></center></td>
		<td><center><font color="NaNNaNBB00"><?php echo necro_scale($armours['necromancer_corrosion']); ?></font></center></td>
		<td><center><font color="737300"><?php echo necro_scale($armours['necromancer_lightning']); ?></font></center></td>
		<td><center><font color="800080"><?php echo necro_scale($armours['necromancer_psionic']); ?></font></center></td>
		<td><center><font color="BF40BF"><?php echo necro_scale($armours['necromancer_power']); ?></font></center></td>
		<td><center><font color="008000"><?php echo necro_scale($armours['necromancer_virulence']); ?></font></center></td>
		<td><center><font color="00BBBB"><?php echo necro_scale($armours['necromancer_light']); ?></font></center></td>
		<td><center><?php echo bard_scale($armours['bard_overall'])?></center></td>
		<td><center><?php echo bard_scale($armours['bard_compare'])?></center></td>
		<td><?php
		if ("bind on equip" == $armour['binding']) {
			?><font color="008000"> <?
		    echo $armours['binding'];
            ?></font><?
		}
		if ("bind on pickup" == $armour['binding']) {
			?><font color="800080"> <?
		    echo $armours['binding'];
            ?></font><?
		}
		
		if ("none" != $armours['unique']) {
		    ?><font color="<?php echo $var; ?>"> <?
		    echo $armours['unique'];
            ?></font><?
        }
		
		?></td>
		<td><?
		preg_match('/wordpress_logged_in_[0-9a-z]+=([A-Za-z0-9]+)%/', $_SERVER["HTTP_COOKIE"], $matches);
            if ($matches[1]) { ?><a href="/library/secure/editarmour.php?armourID=<?php echo urlencode($armours['armourID']); ?>">[edit]</a><? } ?></td>
	</tr><?php } ?>
</table>