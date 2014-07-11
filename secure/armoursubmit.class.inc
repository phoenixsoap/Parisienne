<?php /*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::/

	  SUBMIT CLASS - Populates blogs to the database

/::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

class Armoursubmit {
	
	var $armourID;
	var $date;

	//database settings
	var $table;

	function Armoursubmit () {
		//armour ID
		$this->armourID = $_POST['armourID'];
		$this->table = "armour";
		$this->submitarmour($this->armourID, $this->table);
	}

	function submitarmour ($armourID, $table) {
		$set = "name=(\"" . $_POST['name'] . "\")";
		if (isset($_POST['armourdescription'])) $set .= $this->addToSet($_POST['armourdescription'], "armourdescription");
		if (isset($_POST['type'])) $set .= $this->addToSet($_POST['type'], "type");
		if (isset($_POST['description'])) $set .= $this->addToSet($_POST['description'], "description");
		if (isset($_POST['level_requirement'])) $set .= $this->addToSet($_POST['level_requirement'], "level_requirement");
		if (isset($_POST['other_requirement'])) $set .= $this->addToSet($_POST['other_requirement'], "other_requirement");
		if (isset($_POST['physical'])) $set .= $this->addToSet($_POST['physical'], "physical");
		if (isset($_POST['edged'])) $set .= $this->addToSet($_POST['edged'], "edged");
		if (isset($_POST['blunt'])) $set .= $this->addToSet($_POST['blunt'], "blunt");
		if (isset($_POST['fire'])) $set .= $this->addToSet($_POST['fire'], "fire");
		if (isset($_POST['electric'])) $set .= $this->addToSet($_POST['electric'], "electric");
		if (isset($_POST['mind'])) $set .= $this->addToSet($_POST['mind'], "mind");
		if (isset($_POST['energy'])) $set .= $this->addToSet($_POST['energy'], "energy");
		if (isset($_POST['poison'])) $set .= $this->addToSet($_POST['poison'], "poison");
		if (isset($_POST['radiation'])) $set .= $this->addToSet($_POST['radiation'], "radiation");
		if (isset($_POST['damage_reduction'])) $set .= $this->addToSet($_POST['damage_reduction'], "damage_reduction");
		if (isset($_POST['special_melee_defense'])) $set .= $this->addToSet($_POST['special_melee_defense'], "special_melee_defense");
		if (isset($_POST['block_chance'])) $set .= $this->addToSet($_POST['block_chance'], "block_chance");
		if (isset($_POST['reflect'])) $set .= $this->addToSet($_POST['reflect'], "reflect");
		if (isset($_POST['light'])) $set .= $this->addToSet($_POST['light'], "light");
		if (isset($_POST['weight'])) $set .= $this->addToSet($_POST['weight'], "weight");
		if (isset($_POST['world_drop'])) $set .= $this->addToSet($_POST['world_drop'], "world_drop");
		if (isset($_POST['fake'])) $set .= $this->addToSet($_POST['fake'], "fake");
		if (isset($_POST['unbreakable'])) $set .= $this->addToSet($_POST['unbreakable'], "unbreakable");
		if (isset($_POST['binding'])) $set .= $this->addToSet($_POST['binding'], "binding");
		if (isset($_POST['unique'])) $set .= $this->addToSet($_POST['unique'], "unique");
		if (isset($_POST['cursed'])) $set .= $this->addToSet($_POST['cursed'], "cursed");
		if (isset($_POST['no_drop'])) $set .= $this->addToSet($_POST['no_drop'], "no_drop");
		if (isset($_POST['no_remove'])) $set .= $this->addToSet($_POST['no_remove'], "no_remove");
		if (isset($_POST['unidentified'])) $set .= $this->addToSet($_POST['unidentified'], "unidentified");
		if (isset($_POST['enchanted'])) $set .= $this->addToSet($_POST['enchanted'], "enchanted");
		if (isset($_POST['strength'])) $set .= $this->addToSet($_POST['strength'], "strength");
		if (isset($_POST['dexterity'])) $set .= $this->addToSet($_POST['dexterity'], "dexterity");
		if (isset($_POST['wisdom'])) $set .= $this->addToSet($_POST['wisdom'], "wisdom");
		if (isset($_POST['intelligence'])) $set .= $this->addToSet($_POST['intelligence'], "intelligence");
		if (isset($_POST['constitution'])) $set .= $this->addToSet($_POST['constitution'], "constitution");
		if (isset($_POST['charisma'])) $set .= $this->addToSet($_POST['charisma'], "charisma");
		if (isset($_POST['hp_regen'])) $set .= $this->addToSet($_POST['hp_regen'], "hp_regen");
		if (isset($_POST['sp_regen'])) $set .= $this->addToSet($_POST['sp_regen'], "sp_regen");
		if (isset($_POST['notes'])) $set .= $this->addToSet($_POST['notes'], "notes");
		if (isset($_POST['necromancer_edged'])) $set .= $this->addToSet($_POST['necromancer_edged'], "necromancer_edged");
		if (isset($_POST['necromancer_crushing'])) $set .= $this->addToSet($_POST['necromancer_crushing'], "necromancer_crushing");
		if (isset($_POST['necromancer_flame'])) $set .= $this->addToSet($_POST['necromancer_flame'], "necromancer_flame");
		if (isset($_POST['necromancer_cold'])) $set .= $this->addToSet($_POST['necromancer_cold'], "necromancer_cold");
		if (isset($_POST['necromancer_corrosion'])) $set .= $this->addToSet($_POST['necromancer_corrosion'], "necromancer_corrosion");
		if (isset($_POST['necromancer_lightning'])) $set .= $this->addToSet($_POST['necromancer_lightning'], "necromancer_lightning");
		if (isset($_POST['necromancer_psionic'])) $set .= $this->addToSet($_POST['necromancer_psionic'], "necromancer_psionic");
		if (isset($_POST['necromancer_power'])) $set .= $this->addToSet($_POST['necromancer_power'], "necromancer_power");
		if (isset($_POST['necromancer_virulence'])) $set .= $this->addToSet($_POST['necromancer_virulence'], "necromancer_virulence");
		if (isset($_POST['necromancer_light'])) $set .= $this->addToSet($_POST['necromancer_light'], "necromancer_light");
		if (isset($_POST['necromancer_overall'])) $set .= $this->addToSet($_POST['necromancer_overall'], "necromancer_overall");
		if (isset($_POST['knight_edged'])) $set .= $this->addToSet($_POST['knight_edged'], "knight_edged");
		if (isset($_POST['knight_blunt'])) $set .= $this->addToSet($_POST['knight_blunt'], "knight_blunt");
		if (isset($_POST['knight_fire'])) $set .= $this->addToSet($_POST['knight_fire'], "knight_fire");
		if (isset($_POST['knight_ice'])) $set .= $this->addToSet($_POST['knight_ice'], "knight_ice");
		if (isset($_POST['knight_acid'])) $set .= $this->addToSet($_POST['knight_acid'], "knight_acid");
		if (isset($_POST['knight_electric'])) $set .= $this->addToSet($_POST['knight_electric'], "knight_electric");
		if (isset($_POST['knight_mind'])) $set .= $this->addToSet($_POST['knight_mind'], "knight_mind");
		if (isset($_POST['knight_energy'])) $set .= $this->addToSet($_POST['knight_energy'], "knight_energy");
		if (isset($_POST['knight_poison'])) $set .= $this->addToSet($_POST['knight_poison'], "knight_poison");
		if (isset($_POST['knight_radiation'])) $set .= $this->addToSet($_POST['knight_radiation'], "knight_radiation");
		if (isset($_POST['bard_overall'])) $set .= $this->addToSet($_POST['bard_overall'], "bard_overall");
		if (isset($_POST['bard_compare'])) $set .= $this->addToSet($_POST['bard_compare'], "bard_compare");
		if (isset($_POST['bard_edged'])) $set .= $this->addToSet($_POST['bard_edged'], "bard_edged");
		if (isset($_POST['bard_edged_low'])) $set .= $this->addToSet($_POST['bard_edged_low'], "bard_edged_low");
		if (isset($_POST['bard_blunt'])) $set .= $this->addToSet($_POST['bard_blunt'], "bard_blunt");
		if (isset($_POST['bard_blunt_low'])) $set .= $this->addToSet($_POST['bard_blunt_low'], "bard_blunt_low");
		if (isset($_POST['bard_fire'])) $set .= $this->addToSet($_POST['bard_fire'], "bard_fire");
		if (isset($_POST['bard_fire_low'])) $set .= $this->addToSet($_POST['bard_fire_low'], "bard_fire_low");
		if (isset($_POST['bard_ice'])) $set .= $this->addToSet($_POST['bard_ice'], "bard_ice");
		if (isset($_POST['bard_ice_low'])) $set .= $this->addToSet($_POST['bard_ice_low'], "bard_ice_low");
		if (isset($_POST['bard_acid'])) $set .= $this->addToSet($_POST['bard_acid'], "bard_acid");
		if (isset($_POST['bard_acid_low'])) $set .= $this->addToSet($_POST['bard_acid_low'], "bard_acid_low");
		if (isset($_POST['bard_electric'])) $set .= $this->addToSet($_POST['bard_electric'], "bard_electric");
		if (isset($_POST['bard_electric_low'])) $set .= $this->addToSet($_POST['bard_electric_low'], "bard_electric_low");
		if (isset($_POST['bard_mind'])) $set .= $this->addToSet($_POST['bard_mind'], "bard_mind");
		if (isset($_POST['bard_mind_low'])) $set .= $this->addToSet($_POST['bard_mind_low'], "bard_mind_low");
		if (isset($_POST['bard_energy'])) $set .= $this->addToSet($_POST['bard_energy'], "bard_energy");
		if (isset($_POST['bard_energy_low'])) $set .= $this->addToSet($_POST['bard_energy_low'], "bard_energy_low");
		if (isset($_POST['bard_poison'])) $set .= $this->addToSet($_POST['bard_poison'], "bard_poison");
		if (isset($_POST['bard_poison_low'])) $set .= $this->addToSet($_POST['bard_poison_low'], "bard_poison_low");
		if (isset($_POST['bard_radiation'])) $set .= $this->addToSet($_POST['bard_radiation'], "bard_radiation");
		if (isset($_POST['bard_radiation_low'])) $set .= $this->addToSet($_POST['bard_radiation_low'], "bard_radiation_low");
		if (isset($_POST['bard_specialdefense'])) $set .= $this->addToSet($_POST['bard_specialdefense'], "bard_specialdefense");
		if (isset($_POST['bard_value'])) $set .= $this->addToSet($_POST['bard_value'], "bard_value");
		if (isset($_POST['bard_lore'])) $set .= $this->addToSet($_POST['bard_lore'], "bard_lore");

		$set .= ', modified=NULL';
		
		//determine INSERT or UPDATE (if insert timestamp creation time)
		$blogarmourcheckquery = "select armourID from armour where armourID = \"$armourID\"";
		$checkarmourID = mysql_query($blogarmourcheckquery) or die('check query failed');
		$blog = mysql_fetch_assoc($checkarmourID); 
		if (isset($blog['armourID'])) {
			$insertType = "UPDATE";
			$where = " WHERE armourID = (\"$armourID\")";
		} else {
		    preg_match('/wordpress_logged_in_[0-9a-z]+=([A-Za-z0-9]+)%/', $_SERVER["HTTP_COOKIE"], $matches);
			$set .= ', created=now()';
			$set .= ', creator=("' . $matches[1] . '")';
			$insertType = "INSERT INTO";
		}

		//submit blogarmour part of show
		echo $blogarmourquery = "$insertType $table set $set$where;";
		$result = mysql_query($blogarmourquery) or die("Query failed");
		
		if ($insertType == " INSERT INTO")
		    echo $armourID = mysql_insert_id();
	}

	
	
	function filter ($text) {
		//trim extranous stuff from head and tail of cell
		$text = trim($text);
		
		//tabs to spaces
		$text = str_replace("\t", ' ', $text);
		
		//remove double spaces
		//$text = str_replace('  ', ' ', $text); //str_replace method
		//$text = preg_replace('//', '//', $text); //regular expression method
		$text = $this->doublespace($text); //recursion method
		
		//non-unix linefeeds and carriage returns to unix style newline
		//$text = str_replace('\r\n', '\n', $text); 
		//$text = str_replace('\r', '\n', $text);
		$text = preg_replace("/\r\n|\r/", "\n", $text); //regular expression method

		//spaces at begininings of lines
		$text = $this->beginningoflinespace($text);
		
		//spaces at ends of lines
		$text = $this->endoflinespace($text);
		
		//extra line breaks.
		
		return $text;
	}
	
	function doublespace ($string) {
		$compare = $string;
		$string = str_replace('  ', ' ', $string);
		if ($compare != $string) { //if double spaces are found search again
			$string = $this->doublespace($string);
	    }
	
	    return $string;
	}
	
	function endoflinespace ($string) {
		$compare = $string;
		$string = str_replace(" \n", "\n", $string);
		if ($compare != $string) { //if spaces are found search again
			$string = $this->endoflinespace($string);
	    }
	
	    return $string;
	}
	
	function beginningoflinespace ($string) {
		$compare = $string;
		$string = str_replace("\n ", "\n", $string);
		if ($compare != $string) { //if spaces are found search again
			$string = $this->beginningoflinespace($string);
	    }
	
	    return $string;
	}
	
	function addToSet ($field, $fieldname, $time=0) {
		if ($field != '') {
			$field = $this->filter($field);
			return ", armour.$fieldname=(\"$field\")";
		} elseif ($time == 1) {
			if (count (explode (':', $time)) == 2)
				return ", $fieldname=(\"00:$time\")";
			else
				return ", $fieldname=(\"$time\")";
		} else {
			return ', ' . $fieldname . '=NULL';
		}
	}

	function addTextToSet ($field, $fieldname) {
		$field = $this->filter($field);
		//$tmp = addslashes ($field); //not using because magic quites are on
		return ", $fieldname=(\"$field\")";
	}

	function addTimeToSet ($time, $fieldname) { //still needs to handle 'days'
		if (count (explode (':', $time)) == 2)
			return ", $fieldname=(\"00:$time\")";
		else
			return ", $fieldname=(\"$time\")";
	}
} ?>