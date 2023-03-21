$(function() {
    // Set up the datepicker for the start date input
    $("#start_date").datepicker({
        dateFormat: "yy-mm-dd",
        onSelect: function(selectedDate) {
            // When a date is selected in the start datepicker, set the minDate of the end datepicker to the selected date
            $("#end_date").datepicker("option", "minDate", selectedDate);
        }
    });

    // Set up the datepicker for the end date input
    $("#end_date").datepicker({
        dateFormat: "yy-mm-dd",
        onSelect: function(selectedDate) {
            // When a date is selected in the end datepicker, set the maxDate of the start datepicker to the selected date
            $("#start_date").datepicker("option", "maxDate", selectedDate);
        }
    });
});

