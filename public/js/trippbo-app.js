// clear fillter
function clear_fillter(e){
  e.parentElement.reset();
}

// increment - decrement
$(function () {
	$("[data-decrease]").click(decrease);
	$("[data-increase]").click(increase);
	$("[data-value]").change(valueChange);
});

function decrease() {
	var value = $(this).parent().find("[data-value]").val();
	if (value > 0) {
		value--;
		$(this).parent().find("[data-value]").val(value);
	}
}

function increase() {
	var value = $(this).parent().find("[data-value]").val();
	if (value < 11) {
		value++;
		$(this).parent().find("[data-value]").val(value);
	}
}

function valueChange() {
	var value = $(this).val();
	if (value == undefined || isNaN(value) == true || value <= 0) {
		$(this).val(1);
	} else if (value >= 12) {
		$(this).val(11);
	}
}

// ticket inputs

let ticket_input_a = document.querySelector("#ticket_input_a");
let ticket_input_b = document.querySelector("#ticket_input_b");
let popup_input_ticket_1 = document.querySelector(".popup_input_ticket_1");
let popup_input_ticket_2 = document.querySelector(".popup_input_ticket_2");
