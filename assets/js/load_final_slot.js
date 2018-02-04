$(document).on('click', '#slot-btn', function() {

    var slot_time = $(this).text();
    var today = new Date();
    var dd = today.getDate();


    var weekday = new Array(7);

    weekday[0] =  "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Thursday";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";

    var day = weekday[today.getDay()];

    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();

    var slot_date = yyyy+'-'+mm+'-'+dd+','+day;



    $("#appointment_time").val(slot_date+","+slot_time);
});


