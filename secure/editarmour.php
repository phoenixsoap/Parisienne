<?php
$link = mysql_connect('3kdb.darlingdisaster.com', 'phoenixsoap', 'powerme')
    or die('Could not connect');
mysql_select_db('3kingdoms') or die('Could not select database');
mysql_query("SET NAMES utf8");

	switch (true) {
        case (isset($_POST['post'])):
            require 'armoursubmit.class.inc';
			$submit = new Armoursubmit;
			//$submit->Armoursubmit();
			header( 'Location: http://3k.darlingdisaster.com/armours/' ) ;
			exit;
        case (isset($_GET['armourID'])):
            require 'armour.class.inc';
            $armour = new Armour;
            $timestamp = strtotime($armour->date);
            $loaddefaults = true;
            break;
        default:
            $loaddefaults = false;
    }


    /* Custom Functions */

	function tooltext ($text) {
        return htmlentities($text, ENT_QUOTES, "UTF-8");
    }
    
		function enum2 ($table, $column) {
			
			$sql = "SHOW COLUMNS FROM $table LIKE '$column'";
			if ($result = mysql_query($sql)) { // If the query's successful
				
				$enum = mysql_fetch_object($result);
				preg_match_all("/'([\w ]*)'/", $enum->Type, $values);
				return $values[1];
				
			} else {
				
				die("Unable to fetch enum values: ".mysql_error());
				
			}
			
		}
		
		function enum ($Table,$Column)
    {
    $dbSQL = "SHOW COLUMNS FROM ".$Table." LIKE '".$Column."'";
    $dbQuery = mysql_query($dbSQL);

    $dbRow = mysql_fetch_assoc($dbQuery);
    $EnumValues = $dbRow["Type"];

    $EnumValues = substr($EnumValues, 6, strlen($EnumValues)-8);
    $EnumValues = str_replace("','","-----",$EnumValues);
    $EnumValues = str_replace("''","'",$EnumValues);

    return explode("-----",$EnumValues);
    }

    function dropdown ($field, $value, $nullallowed) {

        echo '<select name="' . $field . '">';
        if ($nullallowed) {
            echo "\n    <option value=\"\"";
    		if (!$loaddefaults)
    		    echo ' selected';
            echo '></option>';
        }
		foreach (enum('armour', $field) as $property) {
			echo "\n" . '    <option value="' . $property . '"';
			if ($value == $property)
			    echo ' selected>';
			else
			    echo '>';
			echo $property;
			echo '</option>';
		} 
	    echo "\n</select>";
	}


/********************************** PHP HEADER *****************************************/
    //unset register global variables
    //$arr = array_merge(&$_ENV,&$_GET,&$_POST,&$_COOKIE);
    //while(list($key) = each($arr)) unset(${$key});

    
if ($loaddefaults) print "<h2>" . $armour->ptext($armour->seriestitle) . "</h2>"; ?>

		  <form name="EditaArmour" method="post" action="/library/secure/editarmour.php">
		  <p>Name: <input type="text" name="name" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->name) . "\" "; ?>size="41"><br />
		  
		  <br>Description:<br /><textarea name="description" rows="3" wrap="VIRTUAL" cols="51"><?php if ($loaddefaults) print tooltext($armour->description); ?></textarea></p>
		  
<br />Type: <?php dropdown("type", $armour->type, 0); ?>


<br />Level Requirement: <input type="text" name="level_requirement" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->level_requirement) . "\" "; ?>size="4">
<br />Other Requirement: <input type="text" name="other_requirement" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->other_requirement) . "\" "; ?>size="42"><br />
<br />ID's: <input type="text" name="ids" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->ids) . "\" "; ?>size="42"><br />
<!--physical
<br />edged
<br />blunt
<br />fire
<br />electric
<br />mind
<br />energy
<br />poison
<br />radiation-->
<br />Special Melee Defense: <input type="checkbox" name="special_melee_defense" value="1"<?php if ($armour->special_melee_defense) echo " checked"; ?>>
<br />Block Chance: <input type="text" name="block_chance" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->block_chance) . "\" "; ?>size="4">
<br />Reflect: <input type="checkbox" name="reflect" value="1"<?php if ($armour->reflect) echo " checked"; ?>>
<br />Damage Reduction: <input type="checkbox" name="damage_reduction" value="1"<?php if ($armour->damage_reduction) echo " checked"; ?>>
<br />Weight: <?php dropdown("weight", $armour->binding, 0); ?>
<br />World Drop: <input type="checkbox" name="world_drop" value="1"<?php if ($armour->world_drop) echo " checked"; ?>>
<br />fake: <input type="checkbox" name="fake" value="1"<?php if ($armour->fake) echo " checked"; ?>>
<br />Unbreakable: <input type="checkbox" name="unbreakable" value="1"<?php if ($armour->unbreakable) echo " checked"; ?>>
<br />+Light: <input type="text" name="light" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->light) . "\" "; ?>size="4">
<br />Binding: <?php dropdown("binding", $armour->binding, 0); ?>
<br />Unique: <?php dropdown("unique", $armour->unique, 0); ?>
<br />Cursed: <input type="checkbox" name="cursed" value="1"<?php if ($armour->cursed) echo " checked"; ?>>
<br />nodrop: <input type="checkbox" name="no_drop" value="1"<?php if ($armour->no_drop) echo " checked"; ?>>
<br />noremove: <input type="checkbox" name="no_remove" value="1"<?php if ($armour->no_remove) echo " checked"; ?>>
<br />Unidentified Description: <input type="text" name="unidentified" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->unidentified) . "\" "; ?>size="41"><br />
<br />Enchanted: <input type="checkbox" name="enchanted" value="1"<?php if ($armour->enchanted) echo " checked"; ?>>

<table width="100%">
	<tr>
		<td>Strength: <input type="text" name="strength" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->strength) . "\" "; ?>size="4"></td>
		<td>Constitution: <input type="text" name="constitution" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->constitution) . "\" "; ?>size="4"></td>
		<td>Intelligence: <input type="text" name="intelligence" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->intelligence) . "\" "; ?>size="4"></td>
	</tr>
	<tr>
		<td>Wisdom: <input type="text" name="wisdom" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->wisdom) . "\" "; ?>size="4"></td>
		<td>Dexterity: <input type="text" name="dexterity" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->dexterity) . "\" "; ?>size="4"></td>
		<td>Charisma: <input type="text" name="charisma" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->charisma) . "\" "; ?>size="4"></td>
	</tr>
	<tr>
		<td colspan="3"><center>Hit Point Regen: <input type="text" name="hp_regen" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->hp_regen) . "\" "; ?>size="4"> Spell Point Regen: <input type="text" name="sp_regen" <?php if ($loaddefaults) print "value=\"" . tooltext($armour->sp_regen) . "\" "; ?>size="4"></center></td>
	</tr>
</table>
<br />Notes: <br /><textarea name="notes" rows="3" wrap="VIRTUAL" cols="51"><?php if ($loaddefaults) print tooltext($armour->notes); ?></textarea>
<br /><br />

<h2>Necromancer</h2>

<br />Edged: <?php dropdown("necromancer_edged", $armour->necromancer_edged, 1); ?>
<br />Crushing: <?php dropdown("necromancer_crushing", $armour->necromancer_crushing, 1); ?>
<br />Flame: <?php dropdown("necromancer_flame", $armour->necromancer_flame, 1); ?>
<br />Cold: <?php dropdown("necromancer_cold", $armour->necromancer_cold, 1); ?>
<br />Corrosion: <?php dropdown("necromancer_corrosion", $armour->necromancer_corrosion, 1); ?>
<br />Lightning: <?php dropdown("necromancer_lightning", $armour->necromancer_lightning, 1); ?>
<br />Psionic: <?php dropdown("necromancer_psionic", $armour->necromancer_psionic, 1); ?>
<br />Power: <?php dropdown("necromancer_power", $armour->necromancer_power, 1); ?>
<br />Virulence: <?php dropdown("necromancer_virulence", $armour->necromancer_virulence, 1); ?>
<br />Light: <?php dropdown("necromancer_light", $armour->necromancer_light, 1); ?>
<br />Overall: <?php dropdown("necromancer_overall", $armour->necromancer_overall, 1); ?>

<h2>Knights</h2>

<table width="100%">
	<tr>
		<td>Edged: <?php dropdown("knight_edged", $armour->knight_edged, 1); ?></td>
		<td>Electric: <?php dropdown("knight_electric", $armour->knight_electric, 1); ?></td>
	</tr>
	<tr>
		<td>Blunt: <?php dropdown("knight_blunt", $armour->knight_blunt, 1); ?></td>
		<td>Mind: <?php dropdown("knight_mind", $armour->knight_mind, 1); ?></td>
	</tr>
	<tr>
		<td>Fire: <?php dropdown("knight_fire", $armour->knight_fire, 1); ?></td>
		<td>Energy: <?php dropdown("knight_energy", $armour->knight_energy, 1); ?></td>
	</tr>
	<tr>
		<td>Ice: <?php dropdown("knight_ice", $armour->knight_ice, 1); ?></td>
		<td>Poison: <?php dropdown("knight_poison", $armour->knight_poison, 1); ?></td>
	</tr>
	<tr>
		<td>Acid: <?php dropdown("knight_acid", $armour->knight_acid, 1); ?></td>
		<td>Radiation: <?php dropdown("knight_radiation", $armour->knight_radiation, 1); ?></td>
	</tr>
</table>

<h2>Bards</h2>

<table>
	<tr>
		<td colspan=4>Overall: <?php dropdown("bard_overall", $armour->bard_overall, 1); ?></td>
	</tr>
	<tr>
		<td colspan=4>Compare: <?php dropdown("bard_compare", $armour->bard_compare, 1); ?></td>
	</tr>
	<tr>
		<td>Edged:</td>
		<td><?php dropdown("bard_edged", $armour->bard_edged, 1); ?></td>
		<td>compare:</td>
		<td><?php dropdown("bard_edged_low", $armour->bard_edged_low, 1); ?></td>
	</tr>
	<tr>
		<td>Blunt:</td>
		<td><?php dropdown("bard_blunt", $armour->bard_blunt, 1); ?></td>
		<td>Compare:</td>
		<td><?php dropdown("bard_blunt_low", $armour->bard_blunt_low, 1); ?></td>
	</tr>
	<tr>
		<td>Fire:</td>
		<td><?php dropdown("bard_fire", $armour->bard_fire, 1); ?></td>
		<td>Compare:</td>
		<td><?php dropdown("bard_fire_low", $armour->bard_fire_low, 1); ?></td>
	</tr>
	<tr>
		<td>Ice:</td>
		<td><?php dropdown("bard_ice", $armour->bard_ice, 1); ?></td>
		<td>Compare:</td>
		<td><?php dropdown("bard_ice_low", $armour->bard_ice_low, 1); ?></td>
	</tr>
	<tr>
		<td>Acid</td>
		<td><?php dropdown("bard_acid", $armour->bard_acid, 1); ?></td>
		<td>Compare:</td>
		<td><?php dropdown("bard_acid_low", $armour->bard_acid_low, 1); ?></td>
	</tr>
	<tr>
		<td>Electric:</td>
		<td><?php dropdown("bard_electric", $armour->bard_electric, 1); ?></td>
		<td>Compare:</td>
		<td><?php dropdown("bard_electric_low", $armour->bard_electric_low, 1); ?></td>
	</tr>
	<tr>
		<td>Mind:</td>
		<td><?php dropdown("bard_mind", $armour->bard_mind, 1); ?></td>
		<td>Compare:</td>
		<td><?php dropdown("bard_mind_low", $armour->bard_mind_low, 1); ?></td>
	</tr>
	<tr>
		<td>Energy</td>
		<td><?php dropdown("bard_energy", $armour->bard_energy, 1); ?></td>
		<td>Compare:</td>
		<td><?php dropdown("bard_energy_low", $armour->bard_energy_low, 1); ?></td>
	</tr>
	<tr>
		<td>Poison</td>
		<td><?php dropdown("bard_poison", $armour->bard_poison, 1); ?></td>
		<td>Compare:</td>
		<td><?php dropdown("bard_poison_low", $armour->bard_poison_low, 1); ?></td>
	</tr>
	<tr>
		<td>Radiation</td>
		<td><?php dropdown("bard_radiation", $armour->bard_radiation, 1); ?></td>
		<td>Compare:</td>
		<td><?php dropdown("bard_radiation_low", $armour->bard_radiation_low, 1); ?></td>
	</tr>
	<tr>
		<td colspan=4>Special Defense: <?php dropdown("bard_specialdefense", $armour->bard_specialdefense, 1); ?></td>
	</tr>
	<tr>
		<td colspan=4>Value: <?php dropdown("bard_value", $armour->bard_value, 1); ?></td>
	</tr>
	<tr>
		<td colspan=4>Lore: <br /><textarea name="bard_lore" rows="3" wrap="VIRTUAL" cols="51"><?php if ($loaddefaults) print tooltext($armour->bard_lore); ?></textarea></td>
	</tr>
</table>
<br />Overall: <?php dropdown("bard_overall", $armour->bard_overall, 1); ?>
<br />Compare: <?php dropdown("bard_compare", $armour->bard_compare, 1); ?>
<br />Slashing: <?php dropdown("bard_edged", $armour->bard_edged, 1); ?>
 Slashing compare: <?php dropdown("bard_edged_low", $armour->bard_edged_low, 1); ?>
<br />Crushing: <?php dropdown("bard_blunt", $armour->bard_blunt, 1); ?>
 Crushing compare: <?php dropdown("bard_blunt_low", $armour->bard_blunt_low, 1); ?>
<br />Fire: <?php dropdown("bard_fire", $armour->bard_fire, 1); ?>
 Fire compare: <?php dropdown("bard_fire_low", $armour->bard_fire_low, 1); ?>
<br />Cold: <?php dropdown("bard_ice", $armour->bard_ice, 1); ?>
 Cold compare: <?php dropdown("bard_ice_low", $armour->bard_ice_low, 1); ?>
<br />Acid: <?php dropdown("bard_acid", $armour->bard_acid, 1); ?>
 Acid compare: <?php dropdown("bard_acid_low", $armour->bard_acid_low, 1); ?>
<br />Electric: <?php dropdown("bard_electric", $armour->bard_electric, 1); ?>
 Electric compare: <?php dropdown("bard_electric_low", $armour->bard_electric_low, 1); ?>
<br />Mental: <?php dropdown("bard_mind", $armour->bard_mind, 1); ?>
 Mental compare: <?php dropdown("bard_mind_low", $armour->bard_mind_low, 1); ?>
<br />Magical: <?php dropdown("bard_energy", $armour->bard_energy, 1); ?>
 Magical compare: <?php dropdown("bard_energy_low", $armour->bard_energy_low, 1); ?>
<br />Toxic: <?php dropdown("bard_poison", $armour->bard_poison, 1); ?>
 Toxic compare: <?php dropdown("bard_poison_low", $armour->bard_poison_low, 1); ?>
<br />Radiation: <?php dropdown("bard_radiation", $armour->bard_radiation, 1); ?>
 Radiation compare: <?php dropdown("bard_radiation_low", $armour->bard_radiation_low, 1); ?>
<br />Special Defense: <?php dropdown("bard_specialdefense", $armour->bard_specialdefense, 1); ?>
<br />Value: <?php dropdown("bard_value", $armour->bard_value, 1); ?>
<br />Lore: <br /><textarea name="bard_lore" rows="3" wrap="VIRTUAL" cols="51"><?php if ($loaddefaults) print tooltext($armour->bard_lore); ?></textarea>	  
	
		
		<p><input type="hidden" name="post" value="true">
		<?php if ($loaddefaults) print '<input type="hidden" name="armourID" value="' . tooltext($armour->armourID) . '">'; ?>
        <input type="submit" name="submit" value="Save">
        <input type="reset" name="Clear" value="Clear"></p>
        </form>
        
        <p><a href="http://3k.darlingdisaster.com/armours/">Back to Armour</a></p>