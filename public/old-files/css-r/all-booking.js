/* section */
var aside = document.getElementById("main");
function open_main() {
	aside.style.right = "0%";	
}
function close_main() {
	aside.style.right = "100%";
}

/* section */
var timelineAccordionBtn = document.querySelectorAll(".timeline-accordion > button");
for (var i = 0; i < timelineAccordionBtn.length; i++) {
	timelineAccordionBtn[i].addEventListener("click", function() {
    this.classList.toggle("timeline-accordion-active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = "fit-content";
    } 
  });
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

// for mobile
function mediaQueriesMobile(x) {
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

var checkMobile = window.matchMedia("(max-width: 768px)");
mediaQueriesMobile(checkMobile);
checkMobile.addListener(mediaQueriesMobile);

// for desktop
function mediaQueriesDesktop(x) {
	if (x.matches) {
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
		}
		// Show a tab by default
		document.getElementById("defaultOpen").click();
	}
}

const checkDesktop  = window.matchMedia("(min-width: 769px)");
mediaQueriesDesktop(checkDesktop );
checkDesktop .addListener(mediaQueriesDesktop);