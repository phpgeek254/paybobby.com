$(function(){
	$('.button-collapse').sideNav();
	$('.collapsible').collapsible();
	$('.modal').modal();
	$('.select').material_select();
	$('.slider').slider();
	$('.parallax').parallax();					

	$('#print_order').click(function () {
		window.print();
	});

    $('.datepicker').pickadate({
		minDate:'today',
        selectMonths: true,
        selectYears: 15,
        format: 'yyyy-mm-dd'
    });

    $('.timepicker').pickatime({
        default: 'now',
        twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
        donetext: 'OK',
        autoclose: false,
        vibrate: true // vibrate the device when dragging clock hand
    });

	var message = $('.message').html();
	if (message != null) {
		Materialize.toast(message, 4000);
	}
});