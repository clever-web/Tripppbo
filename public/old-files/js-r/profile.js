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

var accordions = document.getElementsByClassName("accordion");
for (var i = 0; i < accordions.length; i++) {
    accordions[i].addEventListener("click", function() {
        this.classList.toggle("accordion-active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = "fit-content";
        } 
    });
}
