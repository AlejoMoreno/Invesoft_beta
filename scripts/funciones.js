
function uppercase(idname) {
    var x = document.getElementById(idname);
    x.value = x.value.toUpperCase();
}

function separadormiles(idname){

	var x = document.getElementById(idname);
	var number = (int) x.value;
	var result = '';

	while( number.length > 3 ){
	 result = '.' + number.substr(number.length - 3) + result;
	 number = number.substring(0, number.length - 3);
	}

	result = number + result;

	return result;
}