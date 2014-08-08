function color(hot,warm,cold){
var col = "";
		//if hot
		if(hot>warm && hot>cold){
		col = "red";
		}
		//if cold
		else if(cold>warm && cold>hot){
		col = "blue";
		}
		//if hot warm
		else if(hot>cold && hot==warm){
		col = "orange";
		}
		//if cold warm
		else if(cold>hot && cold==warm){
		col = "aqua";
		}
		//if warm
		//else if(warm==hot && warm == cold && cold == hot || warm > hot && warm > cold){
		else{
		col = "green";
		}
return col;
} 





