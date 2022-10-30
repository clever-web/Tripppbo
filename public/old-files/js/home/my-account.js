/* section */
var aside = document.getElementById("main");
function open_main() {
	aside.style.right = "0%";	
}
function close_main() {
	aside.style.right = "100%";
}
function openTab(evt, id) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("trippbo-tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		  tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablink");
	for (i = 0; i < tablinks.length; i++) {
		  tablinks[i].className = tablinks[i].className.replace(" list-1-active", "");
	}
	document.getElementById(id).style.display = "block";
	evt.currentTarget.className += " list-1-active";
}
/* payment methods selection */
var inputCheckboxs = document.getElementsByClassName("input-checkbox");
var grids = document.getElementsByClassName("grid-3-1");
for (var i = 0; i < inputCheckboxs.length; i++) {
	inputCheckboxs[i].addEventListener("change", function() {
		for (var j = 0; j < inputCheckboxs.length; j++) { inputCheckboxs[j].setAttribute("data-checkbox-id", j); }
		
		if (this.checked) {
			grids[this.getAttribute("data-checkbox-id")].classList.add("grid-shadow");
		} else {
			grids[this.getAttribute("data-checkbox-id")].classList.remove("grid-shadow");
		}

		for (var j = 0; j < inputCheckboxs.length; j++) { inputCheckboxs[j].removeAttribute("data-checkbox-id", j); }
  	});
}

// for mobile
function openTab(evt, id) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("trippbo-tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		  tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablink");
	for (i = 0; i < tablinks.length; i++) {
		  tablinks[i].className = tablinks[i].className.replace(" trippbo-booking-aside-active", "");
	}
	document.getElementById(id).style.display = "block";
	evt.currentTarget.className += " trippbo-booking-aside-active";
	open_main();
}
