<?php /*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::/

		BLOG CLASS - Populates a class keyed to HTTP GET's seriesID

/::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

require_once 'parent.class.inc';

class weapon extends Parental {

	//main
	var $name;

	function weapon () {
		$this->Parental();
		if (isset($weaponID)) {
		} elseif (isset($_POST['post'])) { 
			$weaponID = $_POST['weaponID'];
		} elseif (!empty($_GET['weaponID'])) {
			$weaponID = $_GET['weaponID'];
		} else {
			//print 'ERROR: series ID or date [blog.class.inc]';
			$this->diemessage = 'No weapon specified.';
		}

		//populate main data
		$query = "select * from weapon where weaponID = \"$weaponID\"";
		$mainresult = mysql_query ($query) or die ("ERROR: main data lookup failed [weapon.class.php]");
		$maindata = mysql_fetch_assoc($mainresult) or die($this->diemessage('ERROR: mysql fetch assoc failed',$this->diemessage));
		$this->weaponID = $maindata['weaponID'];
		$this->name = $maindata['name'];
		$this->type = $maindata['type'];
		$this->ids = $maindata['ids'];
		$this->description = $maindata['description'];
		$this->level_requirement = $maindata['level_requirement'];
		$this->other_requirement = $maindata['other_requirement'];
		$this->physical = $maindata['physical'];
		$this->edged = $maindata['edged'];
		$this->blunt = $maindata['blunt'];
		$this->fire = $maindata['fire'];
		$this->electric = $maindata['electric'];
		$this->mind = $maindata['mind'];
		$this->energy = $maindata['energy'];
		$this->poison = $maindata['poison'];
		$this->radiation = $maindata['radiation'];
		$this->damage_reduction = $maindata['damage_reduction'];
		$this->exceptionally_balanced = $maindata['exceptionally_balanced'];
		$this->penetration = $maindata['penetration'];
		$this->non_standard_damage = $maindata['non_standard_damage'];
		$this->reflect = $maindata['reflect'];
		$this->honed = $maindata['honed'];
		$this->light = $maindata['light'];
		$this->two_handed = $maindata['two_handed'];
		$this->world_drop = $maindata['world_drop'];
		$this->fake = $maindata['fake'];
		$this->unbreakable = $maindata['unbreakable'];
		$this->binding = $maindata['bining'];
		$this->unique = $maindata['unique'];
		$this->cursed = $maindata['cursed'];
		$this->no_drop = $maindata['no_drop'];
		$this->no_remove = $maindata['no_remove'];
		$this->unidentified = $maindata['unidentified'];
		$this->enchanted = $maindata['enchanted'];
		$this->strength = $maindata['strength'];
		$this->dexterity = $maindata['dexterity'];
		$this->wisdom = $maindata['wisdom'];
		$this->intelligence = $maindata['intelligence'];
		$this->constitution = $maindata['constitution'];
		$this->charisma = $maindata['charisma'];
		$this->hp_regen = $maindata['hp_regen'];
		$this->sp_regen = $maindata['sp_regen'];
		$this->notes = $maindata['notes'];
		$this->knight_rating = $maindata['knight_rating'];
		$this->knight_primary = $maindata['knight_primary'];
		$this->knight_secondary = $maindata['knight_secondary'];
		$this->bard_overall = $maindata['bard_overall'];
		$this->bard_edged = $maindata['bard_edged'];
		$this->bard_blunt = $maindata['bard_blunt'];
		$this->bard_fire = $maindata['bard_fire'];
		$this->bard_ice = $maindata['bard_ice'];
		$this->bard_acid = $maindata['bard_acid'];
		$this->bard_electric = $maindata['bard_electric'];
		$this->bard_mind = $maindata['bard_mind'];
		$this->bard_energy = $maindata['bard_energy'];
		$this->bard_poison = $maindata['bard_poison'];
		$this->bard_radiation = $maindata['bard_radiation'];
		$this->bard_special_power = $maindata['bard_special_power'];
		$this->bard_value = $maindata['bard_value'];
		$this->bard_lore = $maindata['bard_lore'];
		$this->creator = $maindata['creator'];
		$this->created = $maindata['created'];
		$this->modified = $maindata['modified'];
	}
}