var matchMobile = window.matchMedia("(max-width: 768px)");

var sidepanel = document.getElementById("sidepanel");

function open_sidepanel() {
	sidepanel.style.right = "0%";	
}
function close_sidepanel() {
	 if (matchMobile.matches) {
		sidepanel.style.right = "-100%";
	} else {
		sidepanel.style.right = "-50%";
	}
}

var aside = document.getElementById("aside");
function open_aside() {
	aside.style.right = "0%";	
}
function close_aside() {
	aside.style.right = "-100%";
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
