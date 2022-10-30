window.onload = function () {
  if (
    document.getElementById("slider-1") &&
    document.getElementById("slider-2")
  ) {
    slideOne();
    slideTwo();
  }
  if (
    document.getElementById("slider-3") &&
    document.getElementById("slider-4")
  ) {
    slideThree();
    slideFour();
  }
  if (
    document.getElementById("slider-5") &&
    document.getElementById("slider-6")
  ) {
    slideFive();
    slideSix();
  }
};

let sliderOne = document.getElementById("slider-1");
let sliderTwo = document.getElementById("slider-2");
let sliderThree = document.getElementById("slider-3");
let sliderFour = document.getElementById("slider-4");
let sliderFive, sliderSix;

// this is just for index.html
if (
  document.getElementById("slider-5") &&
  document.getElementById("slider-6")
) {
  sliderFive = document.getElementById("slider-5");
  sliderSix = document.getElementById("slider-6");

  function slideFive() {
    if (parseInt(sliderSix.value) - parseInt(sliderFive.value) <= minGap3) {
      sliderFive.value = parseInt(sliderSix.value) - minGap3;
    }
    fillColor3();
  }

  function slideSix() {
    if (parseInt(sliderSix.value) - parseInt(sliderFive.value) <= minGap3) {
      sliderSix.value = parseInt(sliderFive.value) + minGap3;
    }
    fillColor3();
  }

  function fillColor3() {
    percent5 = (sliderFive.value / sliderMaxValue3) * 100;
    percent6 = (sliderSix.value / sliderMaxValue3) * 100;
    sliderTrack3.style.background = `linear-gradient(to right, #dadae5 ${percent5}% , #000941 ${percent5}% , #000941 ${percent6}%, #dadae5 ${percent6}%)`;
  }
}

let displayValOne = document.getElementById("range1");
let displayValTwo = document.getElementById("range2");
let displayValThree = document.getElementById("range3");
let displayValFour = document.getElementById("range4");

let minGap = 0;
let minGap2 = 0;
let minGap3 = 0;
let sliderTrack = document.querySelector(".slider-track");
let sliderTrack2 = document.querySelector(".slider-track2");
let sliderTrack3 = document.querySelector(".slider-track3");
let sliderMaxValue, sliderMaxValue2, sliderMaxValue3;
if (document.getElementById("slider-1")) {
  sliderMaxValue = document.getElementById("slider-1").max;
}
if (document.getElementById("slider-2")) {
  sliderMaxValue2 = document.getElementById("slider-3").max;
}
if (document.getElementById("slider-5")) {
  sliderMaxValue3 = document.getElementById("slider-5").max;
}

let range_position,
  range_position_span,
  range_position_2,
  range_position_span_2;
if (document.querySelector(".range_position")) {
  range_position = document.querySelector(".range_position");
  range_position_span = document.querySelector("#range_position_span");

  range_position_2 = document.querySelector(".range_position_2");
  range_position_span_2 = document.querySelector("#range_position_span_2");
}

if (sliderOne && sliderTwo) {
  function slideOne() {
    if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
      sliderOne.value = parseInt(sliderTwo.value) - minGap;
    }
    displayValOne.textContent = sliderOne.value;
    fillColor();
  }

  function slideTwo() {
    if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
      sliderTwo.value = parseInt(sliderOne.value) + minGap;
    }

    displayValTwo.textContent = sliderTwo.value;

    if (document.querySelector(".range_position")) {
      range_position.style.left = sliderTwo.value / 55 + "%";
      range_position_span.innerText = sliderTwo.value;
    }

    fillColor();
  }
}

// 1
if (document.querySelector(".range_position")) {
  setInterval(() => {
    let range_update = range_position.style.left;
    let result = range_update.replace("%", "");
    let result_u = Math.floor(result);

    function myFunction(x) {
      if (x.matches) {
        if (result_u <= 70) {
          document.querySelector(".range_value_2").style.opacity = 1;
        } else {
          document.querySelector(".range_value_2").style.opacity = 0;
        }

        if (result_u >= 12) {
          document.querySelector(".range_value_1").style.opacity = 1;
        } else {
          document.querySelector(".range_value_1").style.opacity = 0;
        }
      } else {
        if (result_u <= 58) {
          document.querySelector(".range_value_2").style.opacity = 1;
        } else {
          document.querySelector(".range_value_2").style.opacity = 0;
        }

        if (result_u >= 18) {
          document.querySelector(".range_value_1").style.opacity = 1;
        } else {
          document.querySelector(".range_value_1").style.opacity = 0;
        }
      }
    }

    var x = window.matchMedia("(max-width: 480px)");
    myFunction(x);
    x.addListener(myFunction);
  }, 0);
}

if (sliderThree && sliderFour) {
  function slideThree() {
    if (parseInt(sliderFour.value) - parseInt(sliderThree.value) <= minGap2) {
      sliderThree.value = parseInt(sliderFour.value) - minGap2;
    }

    fillColor2();
  }

  function slideFour() {
    if (parseInt(sliderFour.value) - parseInt(sliderThree.value) <= minGap2) {
      sliderFour.value = parseInt(sliderThree.value) + minGap2;
    }

    if (document.querySelector(".range_position_2")) {
      range_position_2.style.left = sliderFour.value / 2 + "%";
      range_position_span_2.innerText = sliderFour.value;
    }
    fillColor2();
  }
}

function fillColor() {
  percent1 = (sliderOne.value / sliderMaxValue) * 100;
  percent2 = (sliderTwo.value / sliderMaxValue) * 100;
  sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #000941 ${percent1}% , #000941 ${percent2}%, #dadae5 ${percent2}%)`;
}

function fillColor2() {
  percent3 = (sliderThree.value / sliderMaxValue2) * 100;
  percent4 = (sliderFour.value / sliderMaxValue2) * 100;
  sliderTrack2.style.background = `linear-gradient(to right, #dadae5 ${percent3}% , #000941 ${percent3}% , #000941 ${percent4}%, #dadae5 ${percent4}%)`;
}

// sidebar toggle button
// Get the container element
var btnContainer1 = document.getElementById("sidebar_toggle_button1");
var btnContainer2 = document.getElementById("sidebar_toggle_button2");
var btns1, btns2;

// Get all buttons with class="btn" inside the container
if (
  document.getElementById("sidebar_toggle_button1") &&
  document.getElementById("sidebar_toggle_button2")
) {
  btns1 = btnContainer1.getElementsByClassName("sidebar_toggle1");
  btns2 = btnContainer2.getElementsByClassName("sidebar_toggle2");

  // Loop through the buttons and add the active class to the current/clicked button
  for (var i = 0; i < btns1.length; i++) {
    btns1[i].addEventListener("click", function () {
      var current = document.getElementsByClassName("sidebar_toggle_active");
      current[0].className = current[0].className.replace(
        " sidebar_toggle_active",
        ""
      );
      this.className += " sidebar_toggle_active";
    });
  }

  for (var a = 0; a < btns2.length; a++) {
    btns2[a].addEventListener("click", function () {
      var current2 = document.getElementsByClassName("sidebar_toggle_active2");
      current2[0].className = current2[0].className.replace(
        " sidebar_toggle_active2",
        ""
      );
      this.className += " sidebar_toggle_active2";
    });
  }
}

// fillter toggle
if (document.querySelector(".flight_sidebar")) {
  let flight_sidebar = document.querySelector(".flight_sidebar");
  let toggle_btn = document.querySelector(".flight_fillter_btn");
  let sidebar_cross = document.querySelector(".sidebar_cross");
  let flight_box_after = document.querySelector(".flight_box_after");

  toggle_btn.addEventListener("click", (e) => {
    flight_sidebar.classList.toggle("flight_sidebar_active");
    flight_box_after.classList.add("flight_box_after_active");
  });

  flight_box_after.addEventListener("click", (e) => {
    flight_sidebar.classList.remove("flight_sidebar_active");
    e.target.classList.remove("flight_box_after_active");
  });

  sidebar_cross.addEventListener("click", (e) => {
    flight_sidebar.classList.remove("flight_sidebar_active");
  });
}

// change text direction
let change_direction2 = document.querySelector("#change_direction2");
let change_direction = document.querySelector("#change_direction");
if (document.getElementById("change_direction")) {
  change_direction.addEventListener("click", (e) => {
    let val_input_a = ticket_input_a.value;
    let val_input_b = ticket_input_b.value;

    ticket_input_b.value = val_input_a;
    ticket_input_a.value = val_input_b;
  });
}

if (document.getElementById("change_direction2")) {
  change_direction2.addEventListener("click", (e) => {
    let val_input_h = ticket_input_h.value;
    let val_input_i = ticket_input_i.value;

    ticket_input_i.value = val_input_h;
    ticket_input_h.value = val_input_i;
  });
}

// input focus open popup
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function (e) {
    var a,
      b,
      i,
      val = this.value;
    /*close any already open lists of autocompleted values*/
    closeAllLists();
    if (!val) {
      return false;
    }
    currentFocus = -1;
    /*create a DIV element that will contain the items (values):*/
    a = document.createElement("DIV");
    a.setAttribute("id", this.id + "autocomplete-list");
    a.setAttribute("class", "autocomplete-items");
    /*append the DIV element as a child of the autocomplete container:*/
    this.parentNode.appendChild(a);
    /*for each item in the array...*/
    for (i = 0; i < arr.length; i++) {
      /*check if the item starts with the same letters as the text field value:*/
      if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
        /*create a DIV element for each matching element:*/
        b = document.createElement("DIV");
        /*make the matching letters bold:*/
        b.innerHTML =
          "<span class='all_airports'><i class='fas fa-map-marker-alt me-2'></i>" +
          arr[i].substr(0, val.length) +
          "</span>";
        b.innerHTML += arr[i].substr(val.length);
        /*insert a input field that will hold the current array item's value:*/
        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
        /*execute a function when someone clicks on the item value (DIV element):*/
        b.addEventListener("click", function (e) {
          /*insert the value for the autocomplete text field:*/
          inp.value = this.getElementsByTagName("input")[0].value;
          /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
          closeAllLists();
        });
        a.appendChild(b);
      }
    }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function (e) {
    var x = document.getElementById(this.id + "autocomplete-list");
    if (x) x = x.getElementsByTagName("div");
    if (e.keyCode == 40) {
      /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
      currentFocus++;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 38) {
      //up
      /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
      currentFocus--;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 13) {
      /*If the ENTER key is pressed, prevent the form from being submitted,*/
      e.preventDefault();
      if (currentFocus > -1) {
        /*and simulate a click on the "active" item:*/
        if (x) x[currentFocus].click();
      }
    }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = x.length - 1;
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
    closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = [
  "Afghanistan",
  "Albania",
  "Algeria",
  "Andorra",
  "Angola",
  "Anguilla",
  "Antigua & Barbuda",
  "Argentina",
  "Armenia",
  "Aruba",
  "Australia",
  "Austria",
  "Azerbaijan",
  "Bahamas",
  "Bahrain",
  "Bangladesh",
  "Barbados",
  "Belarus",
  "Belgium",
  "Belize",
  "Benin",
  "Bermuda",
  "Bhutan",
  "Bolivia",
  "Bosnia & Herzegovina",
  "Botswana",
  "Brazil",
  "British Virgin Islands",
  "Brunei",
  "Bulgaria",
  "Burkina Faso",
  "Burundi",
  "Cambodia",
  "Cameroon",
  "Canada",
  "Cape Verde",
  "Cayman Islands",
  "Central Arfrican Republic",
  "Chad",
  "Chile",
  "China",
  "Colombia",
  "Congo",
  "Cook Islands",
  "Costa Rica",
  "Cote D Ivoire",
  "Croatia",
  "Cuba",
  "Curacao",
  "Cyprus",
  "Czech Republic",
  "Denmark",
  "Djibouti",
  "Dominica",
  "Dominican Republic",
  "Ecuador",
  "Egypt",
  "El Salvador",
  "Equatorial Guinea",
  "Eritrea",
  "Estonia",
  "Ethiopia",
  "Falkland Islands",
  "Faroe Islands",
  "Fiji",
  "Finland",
  "France",
  "French Polynesia",
  "French West Indies",
  "Gabon",
  "Gambia",
  "Georgia",
  "Germany",
  "Ghana",
  "Gibraltar",
  "Greece",
  "Greenland",
  "Grenada",
  "Guam",
  "Guatemala",
  "Guernsey",
  "Guinea",
  "Guinea Bissau",
  "Guyana",
  "Haiti",
  "Honduras",
  "Hong Kong",
  "Hungary",
  "Iceland",
  "India",
  "Indonesia",
  "Iran",
  "Iraq",
  "Ireland",
  "Isle of Man",
  "Israel",
  "Italy",
  "Jamaica",
  "Japan",
  "Jersey",
  "Jordan",
  "Kazakhstan",
  "Kenya",
  "Kiribati",
  "Kosovo",
  "Kuwait",
  "Kyrgyzstan",
  "Laos",
  "Latvia",
  "Lebanon",
  "Lesotho",
  "Liberia",
  "Libya",
  "Liechtenstein",
  "Lithuania",
  "Luxembourg",
  "Macau",
  "Macedonia",
  "Madagascar",
  "Malawi",
  "Malaysia",
  "Maldives",
  "Mali",
  "Malta",
  "Marshall Islands",
  "Mauritania",
  "Mauritius",
  "Mexico",
  "Micronesia",
  "Moldova",
  "Monaco",
  "Mongolia",
  "Montenegro",
  "Montserrat",
  "Morocco",
  "Mozambique",
  "Myanmar",
  "Namibia",
  "Nauro",
  "Nepal",
  "Netherlands",
  "Netherlands Antilles",
  "New Caledonia",
  "New Zealand",
  "Nicaragua",
  "Niger",
  "Nigeria",
  "North Korea",
  "Norway",
  "Oman",
  "Pakistan",
  "Palau",
  "Palestine",
  "Panama",
  "Papua New Guinea",
  "Paraguay",
  "Peru",
  "Philippines",
  "Poland",
  "Portugal",
  "Puerto Rico",
  "Qatar",
  "Reunion",
  "Romania",
  "Russia",
  "Rwanda",
  "Saint Pierre & Miquelon",
  "Samoa",
  "San Marino",
  "Sao Tome and Principe",
  "Saudi Arabia",
  "Senegal",
  "Serbia",
  "Seychelles",
  "Sierra Leone",
  "Singapore",
  "Slovakia",
  "Slovenia",
  "Solomon Islands",
  "Somalia",
  "South Africa",
  "South Korea",
  "South Sudan",
  "Spain",
  "Sri Lanka",
  "St Kitts & Nevis",
  "St Lucia",
  "St Vincent",
  "Sudan",
  "Suriname",
  "Swaziland",
  "Sweden",
  "Switzerland",
  "Syria",
  "Taiwan",
  "Tajikistan",
  "Tanzania",
  "Thailand",
  "Timor L'Este",
  "Togo",
  "Tonga",
  "Trinidad & Tobago",
  "Tunisia",
  "Turkey",
  "Turkmenistan",
  "Turks & Caicos",
  "Tuvalu",
  "Uganda",
  "Ukraine",
  "United Arab Emirates",
  "United Kingdom",
  "United States of America",
  "Uruguay",
  "Uzbekistan",
  "Vanuatu",
  "Vatican City",
  "Venezuela",
  "Vietnam",
  "Virgin Islands (US)",
  "Yemen",
  "Zambia",
  "Zimbabwe",
];

// starts
let ratingBox = document.querySelector("#rating-container");
let ratings = document.querySelectorAll(".rating__box");

// star rating
let s_rating = document.querySelectorAll(".s_rating");
// user rating
let u_rating = document.querySelectorAll(".u_rating");
// console.log(ratings.length);

if(document.querySelector(".rating__box")){
  for (var i = 0; i < ratings.length; i++) {
    ratings[i].addEventListener("mouseenter", (e) => {
      activateRating(Array.from(ratings).indexOf(e.target));
    });
    ratings[i].addEventListener("mouseleave", (e) => {
      deactivateRating(Array.from(ratings).indexOf(e.target));
    });
  }
}

function activateRating(idx) {
  for (var i = 0; i <= idx; i++) {
    ratings[i].classList.add("h_rated");
  }
}

function deactivateRating(idx) {
  for (var i = 0; i <= idx; i++) {
    ratings[i].classList.remove("h_rated");
  }
}

// star rating
function star_rate(num) {
  var idx = parseInt(num) - 1;
  for (var i = 0; i <= idx; i++) {
    s_rating[i].classList.add("rated");
  }
  for (var i = idx + 1; i < s_rating.length; i++) {
    s_rating[i].classList.remove("rated");
  }
}

// user rating
function user_rate(num) {
  var idx = parseInt(num) - 1;
  for (var i = 0; i <= idx; i++) {
    u_rating[i].classList.add("rated");
  }
  for (var i = idx + 1; i < u_rating.length; i++) {
    u_rating[i].classList.remove("rated");
  }
}
