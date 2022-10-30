var aside = document.getElementById("main");
function open_main() {
	aside.style.right = "0%";	
}
function close_main() {
	aside.style.right = "100%";
}

function openCars(evt, cityName) {
	var i, x, tablinks;
	x = document.getElementsByClassName("car");
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
	}
	tablinks = document.querySelectorAll("#car .trippbo-btn-bar > button");
	for (i = 0; i < x.length; i++) {
		tablinks[i].classList.remove("trippbo-btn-active");
	}
	document.getElementById(cityName).style.display = "block";
	evt.currentTarget.classList.add("trippbo-btn-active");
}
function openFlights(evt, cityName) {
	var i, x, tablinks;
	x = document.getElementsByClassName("flight");
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
	}
	tablinks = document.querySelectorAll("#flights .trippbo-btn-bar > button");
	for (i = 0; i < x.length; i++) {
		tablinks[i].classList.remove("trippbo-btn-active");
	}
	document.getElementById(cityName).style.display = "block";
	evt.currentTarget.classList.add("trippbo-btn-active");
}

var increamentor_plus = document.getElementsByClassName("increamentor-plus");
var increamentor_minus = document.getElementsByClassName("increamentor-minus");
for (var i = 0; i < increamentor_plus.length; i++) {
	increamentor_plus[i].addEventListener("click", function() {
		var minus = this.parentElement.previousElementSibling.previousElementSibling.firstChild;
		var input = this.parentElement.previousElementSibling.firstChild;
		if(parseInt(input.value) === 0){
			input.value = 1;
			input.classList.remove("increamentor-opacity");
			minus.classList.remove("increamentor-opacity");
			minus.classList.remove("increamentor-not-allowed");
		} else {
			input.value = parseInt(input.value) + 1;		
		}
	});	
	increamentor_minus[i].addEventListener("click", function() {
		var input = this.parentElement.nextElementSibling.firstChild;
		var minus = this;
		if(parseInt(input.value) === 1){
			input.value = 0;
			input.classList.add("increamentor-opacity");
			minus.classList.add("increamentor-opacity");				
			minus.classList.add("increamentor-not-allowed");				
		} else if(parseInt(input.value) === 0){
			input.value = 0;						
		} else if(parseInt(input.value) > 1){
			input.value = parseInt(input.value) - 1;						
		}
	});
}

var roundedBtns = document.querySelectorAll(".trippbo-rounded-btn-bar > button");
for (var i = 0; i < roundedBtns.length; i++) {
	roundedBtns[i].addEventListener("click", function() {
		if( this.classList.contains("trippbo-rounded-btn-active") ){
			this.classList.remove("trippbo-rounded-btn-active");
		} else {
			this.classList.add("trippbo-rounded-btn-active");		
		}
	});
}

function mediaQueries(x) {
	if (x.matches) {
		
		var dropdownBtns = document.querySelectorAll(".trippbo-dropdown > button");
		for (var i = 0; i < dropdownBtns.length; i++) {
			dropdownBtns[i].addEventListener("click", function() {
				this.nextElementSibling.style.display = 'block';
			});	
		}

	} else {
		
	}
}

var viewport = window.matchMedia("(max-width: 768px)");
mediaQueries(viewport);
viewport.addListener(mediaQueries);