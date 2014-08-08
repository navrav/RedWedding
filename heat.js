function createHeat(id,radius, x,y,color){
			document.getElementById(id).style.position= "absolute";
			document.getElementById(id).style.backgroundColor= color;
			document.getElementById(id).style.left= (x-radius)+"px";
			document.getElementById(id).style.top= (y-radius)+"px";
			document.getElementById(id).style.width= (radius*2)+"px";
			document.getElementById(id).style.height=""+(radius*2)+"px";
			document.getElementById(id).style.borderRadius = ""+radius+"px";
			document.getElementById(id).style.overflow= "hidden";
			document.getElementById(id).style.opacity = "0.25";
			document.getElementById(id).style.boxShadow = "5px, 5px, 5px, 5px" + ", " + color;

			/* //unit testing purpose only
			if(document.getElementById(id).style.position=="absolute" &&
			document.getElementById(id).style.backgroundColor== color &&
			document.getElementById(id).style.left== (x-radius)+"px" &&
			document.getElementById(id).style.top== (y-radius)+"px" &&
			document.getElementById(id).style.width== (radius*2)+"px" &&
			document.getElementById(id).style.height==""+(radius*2)+"px" &&
			document.getElementById(id).style.borderRadius == ""+radius+"px" &&
			document.getElementById(id).style.overflow== "hidden" &&
			document.getElementById(id).style.opacity =="0.01" ){
			return true;
			}
			else{
			return false;
			} */
			
}
