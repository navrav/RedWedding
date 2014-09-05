function colorpop(crowded,peaceful){
var col = "";
		//if crowded
		if(crowded>peaceful){
		col = "red";
		}
		//if peaceful
		else if(peaceful>crowded){
		col = "aqua";
		}
		//if comfy
		else{
		col = "green";
		}
return col;
} 