

function showdetails(id,wwww) {
	if (wwww==1) {
		console.log(wwww)
		document.getElementById("a"+id).style.display = "none";
		document.getElementById("b"+id).style.display = "block";
		document.getElementById("c"+id).style.display = "block";

		
	}
	else{
		console.log(wwww)
		document.getElementById("a"+id).style.display = "block";
		document.getElementById("b"+id).style.display = "none";
		document.getElementById("c"+id).style.display = "none";

		
	}

}