<?php /*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::/

		BLOG CLASS - Populates a class keyed to HTTP GET's seriesID

/::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

require_once 'parent.class.inc';

class Armour extends Parental {

	//main
	var $name;

	function Armour () {
		$this->Parental();
		if (isset($armourID)) {
		} elseif (isset($_POST['post'])) { 
			$armourID = $_POST['armourID'];
		} elseif (!empty($_GET['armourID'])) {
			$armourID = $_GET['armourID'];
		} else {
			//print 'ERROR: series ID or date [blog.class.inc]';
			$this->diemessage = 'No armour specified.';
		}

		//populate main data
		$query = "select * from armour where armourID = \"$armourID\"";
		$mainresult = mysql_query ($query) or die ("ERROR: main data lookup failed [armour.class.php]");
		$maindata = mysql_fetch_assoc($mainresult) or die($this->diemessage('ERROR: mysql fetch assoc failed',$this->diemessage));
		$this->armourID = $maindata['armourID'];
		$this->name = $maindata['name'];
		$this->type = $maindata['type'];
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
		$this->special_melee_defense = $maindata['special_melee_defense'];
		$this->block_chance = $maindata['block_chance'];
		$this->reflect = $maindata['reflect'];
		$this->light = $maindata['light'];
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
		$this->necromancer_edged = $maindata['necromancer_edged'];
		$this->necromancer_crushing = $maindata['necromancer_crushing'];
		$this->necromancer_flame = $maindata['necromancer_flame'];
		$this->necromancer_cold = $maindata['necromancer_cold'];
		$this->necromancer_corrosion = $maindata['necromancer_corrosion'];
		$this->necromancer_lightning = $maindata['necromancer_lightning'];
		$this->necromancer_psionic = $maindata['necromancer_psionic'];
		$this->necromancer_power = $maindata['necromancer_power'];
		$this->necromancer_virulence = $maindata['necromancer_virulence'];
		$this->necromancer_light = $maindata['necromancer_light'];
		$this->necromancer_overall = $maindata['necromancer_overall'];
		$this->knight_edged = $maindata['knight_edged'];
		$this->knight_blunt = $maindata['knight_blunt'];
		$this->knight_fire = $maindata['knight_fire'];
		$this->knight_ice = $maindata['knight_ice'];
		$this->knight_acid = $maindata['knight_acid'];
		$this->knight_electric = $maindata['knight_electric'];
		$this->knight_mind = $maindata['knight_mind'];
		$this->knight_energy = $maindata['knight_energy'];
		$this->knight_poison = $maindata['knight_poison'];
		$this->knight_radiation = $maindata['knight_radiation'];
		$this->bard_overall = $maindata['bard_overall'];
		$this->bard_compare = $maindata['bard_compare'];
		$this->bard_edged = $maindata['bard_edged'];
		$this->bard_edged_low = $maindata['bard_edged_low'];
		$this->bard_blunt = $maindata['bard_blunt'];
		$this->bard_blunt_low = $maindata['bard_blunt_low'];
		$this->bard_fire = $maindata['bard_fire'];
		$this->bard_fire_low = $maindata['bard_fire_low'];
		$this->bard_ice = $maindata['bard_ice'];
		$this->bard_ice_low = $maindata['bard_ice_low'];
		$this->bard_acid = $maindata['bard_acid'];
		$this->bard_acid_low = $maindata['bard_acid_low'];
		$this->bard_electric = $maindata['bard_electric'];
		$this->bard_electric_low = $maindata['bard_electric_low'];
		$this->bard_mind = $maindata['bard_mind'];
		$this->bard_mind_low = $maindata['bard_mind_low'];
		$this->bard_energy = $maindata['bard_energy'];
		$this->bard_energy_low = $maindata['bard_energy_low'];
		$this->bard_poison = $maindata['bard_poison'];
		$this->bard_poison_low = $maindata['bard_poison_low'];
		$this->bard_radiation = $maindata['bard_radiation'];
		$this->bard_radiation_low = $maindata['bard_radiation_low'];
		$this->bard_specialdefense = $maindata['bard_specialdefense'];
		$this->bard_value = $maindata['bard_value'];
		$this->bard_lore = $maindata['bard_lore'];
		$this->creator = $maindata['creator'];
		$this->created = $maindata['created'];
		$this->modified = $maindata['modified'];
	}
}