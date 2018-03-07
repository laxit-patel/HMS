$(document).ready(function(){

    $("#todays_doctor").change(function(){

        var raw = $(this).val();
        var doctor = raw.slice(0, 9);

        $.ajax({
        url: '../HMS/todays_doctor.php',
        type: 'post',
        data: {doctor:doctor},
        dataType: 'text',
        success:function(response){

                    $("#table_body").html(response);
        }
    });

    });

    $("#todays_slot").change(function(){

        var slot = $(this).val();



    $.ajax({
        url: '../HMS/todays_slot.php',
        type: 'post',
        data: {slot:slot},
        dataType: 'text',
        success:function(slot_response){

                    $("#slot_table_body").html(slot_response);
        }
    })

        });

})