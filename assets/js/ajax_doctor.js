$(document).ready(function(){
$("#js_designation").change(function(){

    var designation = $(this).val();

    $.ajax({
        url: '../HMS/load_doctor.php',
        type: 'post',
        data: {designation:designation},
        dataType: 'text',
        success:function(response){


                $("#js_doc_list").html("<option >"+response+"</option>");
        }
    });

});
});