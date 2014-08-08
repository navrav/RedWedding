
function colorlight(dark,comfy,bright){
var col = "";
		//if dark
		if(dark>comfy && dark>bright){
		col = "black";
		}
		//if bright
		else if(bright>comfy && bright>dark){
		col = "yellow";
		}
		//if dark comfy
		else if(dark>bright && dark==comfy){
		col = "brown";
		}
		//if bright comfy
		else if(bright>dark && bright==comfy){
		col = "aqua";
		}
		//if comfy
		//else if(comfy==dark && comfy == bright && bright == dark || comfy > dark && comfy > bright){
		else{
		col = "green";
		}
return col;
}