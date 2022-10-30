var matchMobile = window.matchMedia("(max-width: 768px)");
function openAllConservation() {
    var x = document.getElementById("dropdown-1");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
window.onclick = function(event) {
    if (!event.target.matches('.dropdown-1')) {
        var x = document.getElementById("dropdown-1");
        if (x.style.display === "block") {
            x.style.display = "none";
        }
    }
}
var chatbox = document.getElementById("chatbox");
function open_chatbox() {
	chatbox.style.top = "78px";	
}
function close_chatbox() {
	 if (matchMobile.matches) {
		chatbox.style.top = "100%";
	}
}
function toggleChatPopup() {
    var x = document.getElementById("chat-popup-container");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
function closeChatPopup() {
    document.getElementById("chat-popup").style.display = "none";
}
function toggleChatListPopup(e) {
    var x = document.getElementById("chat-list-popup-container");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}