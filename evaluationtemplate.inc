<?php

function necro_scale ($analysis) {
	switch ($analysis) {
		case "divine":
    		return 8;
            break;
     	case "unparalleled":
    		return 7;
            break;
     	case "extremely good":
    		return 6;
            break;
     	case "very good":
    		return 5;
            break;
     	case "good":
    		return 4;
            break;
     	case "fine":
    		return 3;
            break;
     	case "sufficient":
    		return 2;
            break;
     	case "fair":
    		return 1;
            break;
     	case "poor":
    		return 0;
            break;
     	case "negative":
    		return -1;
    		break;
	}
}

function knight_scale ($analysis) {
	switch ($analysis) {
		case "negative":
    		return -1;
            break;
     	case "none":
    		return 2;
            break;
     	case "pathetic":
    		return 3;
            break;
     	case "flimsy":
    		return 4;
            break;
     	case "ineffective":
    		return 5;
            break;
     	case "inadequate":
    		return 6;
            break;
     	case "poor":
    		return 7;
            break;
     	case "slight":
    		return 8;
            break;
     	case "lacking":
    		return 9;
            break;
     	case "light":
    		return 10;
            break;
     	case "limited":
    		return 11;
            break;
     	case "below average":
    		return 12;
            break;
     	case "substandard":
    		return 13;
            break;
     	case "mediocre":
    		return 14;
            break;
     	case "average":
    		return 15;
            break;
     	case "intermediate":
    		return 16;
            break;
     	case "middling":
    		return 17;
            break;
     	case "above average":
    		return 18;
            break;
     	case "adequate":
    		return 19;
            break;
     	case "effectual":
    		return 20;
            break;
     	case "good":
    		return 21;
            break;
     	case "very good":
    		return 22;
            break;
     	case "substantial":
    		return 23;
            break;
     	case "significant":
    		return 24;
            break;
     	case "strong":
    		return 25;
            break;
     	case "mighty":
    		return 26;
            break;
     	case "impressive":
    		return 27;
            break;
     	case "powerful":
    		return 28;
            break;
     	case "excellent":
    		return 29;
            break;
     	case "astounding":
    		return 30;
            break;
     	case "prodigious":
    		return 31;
            break;
     	case "superb":
    		return 32;
            break;
     	case "outstanding":
    		return 33;
            break;
     	case "spectacular":
    		return 34;
            break;
     	case "extraordinary":
    		return 35;
            break;
     	case "amazing":
    		return 36;
            break;
     	case "incredible":
    		return 37;
            break;
     	case "wondrous":
    		return 38;
            break;
     	case "legendary":
    		return 39;
            break;
     	case "unearthly":
    		return 40;
    		break;
	}
}

function knight_weapon_scale ($analysis) {
	switch ($analysis) {
     	case "is mostly useless":
    		return 1;
            break;
     	case "has a small amount of potential":
    		return 2;
            break;
     	case "could inflict a mild amount of pain":
    		return 3;
            break;
     	case "could be useful in the right hands":
    		return 4;
            break;
     	case "could be dangerous in the right hands":
    		return 5;
            break;
     	case "has the potential to deal a decent lashing":
    		return 6;
            break;
     	case "can inflict serious harm":
    		return 7;
            break;
     	case "is extremely brutal":
    		return 8;
            break;
     	case "has hugely destructive capabilities":
    		return 9;
            break;
     	case "will obliterate anything that dares cross it":
    		return 10;
            break;
     	case "was forged by the Gods themselves":
    		return 11;
            break;
        case "has a unknown breadth of power":
    		return 12;
            break;
	}
}

function bard_scale ($analysis) {
	switch ($analysis) {
		case "uh, really crap":
    		return -1;
            break;
     	case "barely any":
    		return 1;
            break;
     	case "some":
    		return 2;
            break;
     	case "pretty good":
    		return 3;
            break;
     	case "excellent":
    		return 4;
            break;
     	case "superb":
    		return 5;
            break;
     	case "absurd":
    		return 6;
            break;
     	case "utterly BS":
    		return 7;
    		break;
    	case "none":
    		return 0;
    		break;
    	case "minimum":
    		return 1;
    		break;
    	case "average":
    		return 2;
    		break;
        case "above average":
    		return 3;
    		break;
    	case "maximum":
    		return 4;
    		break;
    	case "above maximum":
    		return 5;
    		break;
    	case "This armor has terrible overall protection":
    		return -1;
    		break;
    	case "You sure this is an armor?":
    		return 0;
    		break;
    	case "You might deflect a gnat with this thing":
    		return 1;
    		break;
    	case "This has decent overall protection":
    		return 2;
    		break;
    	case "This has very good overall protection":
    		return 3;
    		break;
    	case "This has amazing overall protection":
    		return 4;
    		break;
    	case "This has superb overall protection":
    		return 5;
    		break;
    	case "This armor is flat out BS":
    		return 6;
    		break;
    	case "Compared to other armors of this type, this one blows ass":
    		return -1;
    		break;
    	case "Compared to other armors of this type, this one is pretty weak":
    		return 0;
    		break;
    	case "Compared to other armors of this type, this one is below average":
    		return 1;
    		break;
    	case "Compared to other armors of this type, this one is average":
    		return 2;
    		break;
    	case "Compared to other armors of this type, this one is above average":
    		return 3;
    		break;
    	case "Compared to other armors of this type, this one is exceptional":
    		return 4;
    		break;
    	case "This armor allows protection beyond the normal types":
    		return 5;
    		break;
    	case "Compared to other armors of this type, this one is as good, or better, than you could hope for":
    	    return 5;
    		break;
    	case "This armor has no special defense against melee attacks":
    		return 0;
    		break;
    	case "This armor has special defense against melee attacks":
    		return 1;
    		break;
    	case "This armor has incredible special defense against melee attacks":
    	    return 2;
    		break;
        case "This item is worthless!":
    		return 0;
    		break;
    	case "This item is practically worthless!":
    		return 1;
    		break;
    	case "This item is cheap":
    		return 2;
    		break;
    	case "This item is inexpensive":
    		return 3;
    		break;
    	case "This item has some value":
    		return 4;
    		break;
    	case "This item will net good money":
    		return 5;
    		break;
    	case "This item is worth a fair penny!":
    		return 6;
    		break;
    	case "Big bucks and no whammys!":
    		return 7;
    		break;
    	case "This item is worth BS coins":
    		return 3;
    		break;
    	case "Yowsa, this thing is expensive!":
    	    return 8;
    		break;
    	case "Newbies would happily use this":
    		return 1;
    		break;
    	case "A mage might use this":
    		return 2;
    		break;
    	case "A warrior would use this":
    		return 3;
    		break;
    	case "A warrior would be proud to use this":
    		return 4;
    		break;
    	case "The hearty warriors would use this":
    		return 5;
    		break;
    	case "This weapon is BS!":
    	    return 6;
    		break;
	}
}
	
function bard_weapon_scale ($analysis) {
	switch ($analysis) {
	    case "none":
    		return 0;
            break;
     	case "some capability":
    		return 1;
            break;
     	case "standard":
    		return 2;
            break;
     	case "respectable":
    		return 3;
            break;
     	case "absurd":
    		return 4;
            break;
     	case "BS":
    		return 5;
            break;
	}
} ?>