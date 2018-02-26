$("#select_ward").change(function(){
	
	 var ward = $(this).val();
	
	
	
	$.ajax({
        url: '../HMS/load_bed.php',
        type: 'post',
        data: {ward:ward},
        dataType: 'text',
        success:function(response){
                $("#bed_holder").html(response);
        }
    });
	
});