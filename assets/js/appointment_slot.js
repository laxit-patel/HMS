$(document).ready(function(){

    $("#js_doc_list").change(function(){

        var doctor = $(this).val();

        $.ajax({
            url: '../HMS/load_slot.php',
            type: 'post',
            data: {doctor:doctor},
            dataType: 'text',
            success:function(response){


                $("#slot-container").html(response);

            }
        });
    });
});