<?php
$link = mysql_connect('3kdb.darlingdisaster.com', 'phoenixsoap', 'powerme')
    or die('Could not connect');
mysql_select_db('3kingdoms') or die('Could not select database');
mysql_query("SET NAMES utf8");

	switch (true) {
        case (isset($_POST['post'])):
            require 'weaponsubmit.class.inc';
			$submit = new Weaponsubmit;
			header( 'Location: http://3k.darlingdisaster.com/weapons/' ) ;
			exit;
        case (isset($_GET['weaponID'])):
            require 'weapon.class.inc';
            $weapon = new weapon;
            $timestamp = strtotime($weapon->date);
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
		foreach (enum('weapon', $field) as $property) {
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

    
if ($loaddefaults) print "<h2>" . $weapon->ptext($weapon->seriestitle) . "</h2>"; ?>

		  <form name="Editaweapon" method="post" action="/library/secure/editweapon.php">
		  <p>Name: <input type="text" name="name" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->name) . "\" "; ?>size="41"><br />
		  
		  <br>Description:<br /><textarea name="description" rows="3" wrap="VIRTUAL" cols="51"><?php if ($loaddefaults) print tooltext($weapon->description); ?></textarea></p>
		  
<br />Type: <?php dropdown("type", $weapon->type, 0); ?>


<br />Level Requirement: <input type="text" name="level_requirement" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->level_requirement) . "\" "; ?>size="4">
<br />Other Requirement: <input type="text" name="other_requirement" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->other_requirement) . "\" "; ?>size="42"><br />
<!--physical
<br />edged
<br />blunt
<br />fire
<br />electric
<br />mind
<br />energy
<br />poison
<br />radiation-->
<br />Non-Standard Damage Range: <input type="text" name="non_standard_damage" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->non_standard_damage) . "\" "; ?>size="4">
<br />Penetration: <input type="text" name="penetration" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->penetration) . "\" "; ?>size="4">
<br />Two Handed: <input type="checkbox" name="two_handed" value="1"<?php if ($weapon->two_handed) echo " checked"; ?>>
<br />Exceptionally Balanced: <input type="checkbox" name="exceptionally_balanced" value="1"<?php if ($weapon->exceptionally_balanced) echo " checked"; ?>>
<br />Damage Reduction: <input type="checkbox" name="damage_reduction" value="1"<?php if ($weapon->damage_reduction) echo " checked"; ?>>
<br />Reflect: <input type="checkbox" name="reflect" value="1"<?php if ($weapon->reflect) echo " checked"; ?>>
<br />Sharpened: <input type="checkbox" name="honed" value="1"<?php if ($weapon->honed) echo " checked"; ?>>
<br />Weight: <?php dropdown("weight", $weapon->binding, 0); ?>
<br />World Drop: <input type="checkbox" name="world_drop" value="1"<?php if ($weapon->world_drop) echo " checked"; ?>>
<br />fake: <input type="checkbox" name="fake" value="1"<?php if ($weapon->fake || !$loaddefaults) echo " checked"; ?>>
<br />Unbreakable: <input type="checkbox" name="unbreakable" value="1"<?php if ($weapon->unbreakable) echo " checked"; ?>>
<br />+Light: <input type="text" name="light" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->light) . "\" "; ?>size="4">
<br />Binding: <?php dropdown("binding", $weapon->binding, 0); ?>
<br />Unique: <?php dropdown("unique", $weapon->unique, 0); ?>
<br />Cursed: <input type="checkbox" name="cursed" value="1"<?php if ($weapon->cursed) echo " checked"; ?>>
<br />nodrop: <input type="checkbox" name="no_drop" value="1"<?php if ($weapon->no_drop) echo " checked"; ?>>
<br />noremove: <input type="checkbox" name="no_remove" value="1"<?php if ($weapon->no_remove) echo " checked"; ?>>
<br />Unidentified Description: <input type="text" name="unidentified" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->unidentified) . "\" "; ?>size="41"><br />
<br />Enchanted: <input type="checkbox" name="enchanted" value="1"<?php if ($weapon->enchanted) echo " checked"; ?>>

<table width="100%">
	<tr>
		<td>Strength: <input type="text" name="strength" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->strength) . "\" "; ?>size="4"></td>
		<td>Constitution: <input type="text" name="constitution" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->constitution) . "\" "; ?>size="4"></td>
		<td>Intelligence: <input type="text" name="intelligence" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->intelligence) . "\" "; ?>size="4"></td>
	</tr>
	<tr>
		<td>Wisdom: <input type="text" name="wisdom" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->wisdom) . "\" "; ?>size="4"></td>
		<td>Dexterity: <input type="text" name="dexterity" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->dexterity) . "\" "; ?>size="4"></td>
		<td>Charisma: <input type="text" name="charisma" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->charisma) . "\" "; ?>size="4"></td>
	</tr>
	<tr>
		<td colspan="3"><center>Hit Point Regen: <input type="text" name="hp_regen" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->hp_regen) . "\" "; ?>size="4"> Spell Point Regen: <input type="text" name="sp_regen" <?php if ($loaddefaults) print "value=\"" . tooltext($weapon->sp_regen) . "\" "; ?>size="4"></center></td>
	</tr>
</table>
<br />Notes: <br /><textarea name="notes" rows="3" wrap="VIRTUAL" cols="51"><?php if ($loaddefaults) print tooltext($weapon->notes); ?></textarea>
<br /><br />

<h2>Knights</h2>

Rating: <?php dropdown("knight_rating", $weapon->knight_rating, 1); ?><br />
Primary damage type: <?php dropdown("knight_primary", $weapon->knight_primary, 1); ?><br />
Secondary damage type: <?php dropdown("knight_secondary", $weapon->knight_secondary, 1); ?>

<h2>Bards</h2>

<br />Overall: <?php dropdown("bard_overall", $weapon->bard_overall, 1); ?>
<br />Slashing: <?php dropdown("bard_edged", $weapon->bard_edged, 1); ?>
<br />Crushing: <?php dropdown("bard_blunt", $weapon->bard_blunt, 1); ?>
<br />Fire: <?php dropdown("bard_fire", $weapon->bard_fire, 1); ?>
<br />Cold: <?php dropdown("bard_ice", $weapon->bard_ice, 1); ?>
<br />Acid: <?php dropdown("bard_acid", $weapon->bard_acid, 1); ?>
<br />Electric: <?php dropdown("bard_electric", $weapon->bard_electric, 1); ?>
<br />Mental: <?php dropdown("bard_mind", $weapon->bard_mind, 1); ?>
<br />Magical: <?php dropdown("bard_energy", $weapon->bard_energy, 1); ?>
<br />Toxic: <?php dropdown("bard_poison", $weapon->bard_poison, 1); ?>
<br />Radiation: <?php dropdown("bard_radiation", $weapon->bard_radiation, 1); ?>
<br />Special Powers: <input type="checkbox" name="bard_special_power" value="1"<?php if ($weapon->bard_special_power) echo " checked"; ?>>
<br />Value: <?php dropdown("bard_value", $weapon->bard_value, 1); ?>
<br />Lore: <br /><textarea name="bard_lore" rows="3" wrap="VIRTUAL" cols="51"><?php if ($loaddefaults) print tooltext($weapon->bard_lore); ?></textarea>	  
	
		
		<p><input type="hidden" name="post" value="true">
		<?php if ($loaddefaults) print '<input type="hidden" name="weaponID" value="' . tooltext($weapon->weaponID) . '">'; ?>
        <input type="submit" name="submit" value="Save">
        <input type="reset" name="Clear" value="Clear"></p>
        </form>
        
        <p><a href="http://3k.darlingdisaster.com/weapons/">Back to weapon</a></p>