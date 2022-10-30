var aside = document.getElementById("aside");
function open_aside() {
	aside.style.right = "0%";	
}
function close_aside() {
	aside.style.right = "-100%";
}
var container_8 = document.getElementById("container-8");
function open_container_8() {
	container_8.style.right = "0%";	
}
function close_container_8() {
	container_8.style.right = "-100%";
}

var btn_container_star = document.getElementsByClassName("btn-container-star");
for (var i = 0; i < btn_container_star.length; i++) {
	btn_container_star[i].addEventListener("click", function() {
		for (var j = 0; j < btn_container_star.length; j++) { btn_container_star[j].classList.remove("star-active"); }
		this.classList.add("star-active");
	});
}

var aside = document.getElementById("aside");
aside.onscroll = function() { stickyTop() };
var containerTop = document.getElementById("container-3");
var containerBottom = document.getElementById("container-6");
var sticky = containerTop.offsetTop + 10;
function stickyTop() {
	if ((aside.scrollTop) >= sticky) {
		containerTop.classList.add("sticky-top");
		containerBottom.classList.add("sticky-bottom");
	} else {
		containerTop.classList.remove("sticky-top");
		containerBottom.classList.remove("sticky-bottom");
	}
}