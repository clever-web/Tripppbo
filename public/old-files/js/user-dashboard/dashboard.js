const openListing = (container, el) => {
    container.style.right = "0%";
    document.querySelectorAll('.visible-card').forEach((elem) => {
        elem.classList.remove('visible-card');
    });
    container.classList.add('visible-card');
    document.querySelectorAll('.trippbo-dashboard-aside-active').forEach((elem) => {
        elem.classList.remove('trippbo-dashboard-aside-active');
    });
    el.classList.add('trippbo-dashboard-aside-active');
}

var upcomingFlights = document.getElementById("upcomingFlights");
function open_upcomingFlights(el) {
    openListing(upcomingFlights, el);
}
function close_upcomingFlights() {
    upcomingFlights.style.right = "100%";
}

var pastFlights = document.getElementById("pastFlights");
function open_pastFlights(el) {
    openListing(pastFlights, el);
}
function close_pastFlights() {
    pastFlights.style.right = "100%";
}

var upcomingHotelStays = document.getElementById("upcomingHotelStays");
function open_upcomingHotelStays(el) {
    openListing(upcomingHotelStays, el);
}
function close_upcomingHotelStays() {
    upcomingHotelStays.style.right = "100%";
}

var pastHotelStays = document.getElementById("pastHotelStays");
function open_pastHotelStays(el) {
    openListing(pastHotelStays, el);
}
function close_pastHotelStays() {
    pastHotelStays.style.right = "100%";
}

var upcomingActivities = document.getElementById("upcomingActivities");
function open_upcomingActivities(el) {
    openListing(upcomingActivities, el);
}
function close_upcomingActivities() {
    upcomingActivities.style.right = "100%";
}

var pastActivities = document.getElementById("pastActivities");
function open_pastActivities(el) {
    openListing(pastActivities, el);
}
function close_pastActivities() {
    pastActivities.style.right = "100%";
}
