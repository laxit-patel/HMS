$(document).ready(function(){
	
	$("#add_bed").click(function(){
		
		var val = $("#ward_id").val();
		alert(val);
		
		 $.ajax({
        url: '../HMS/add_bed.php',
        type: 'post',
        data: {val:val},
        dataType: 'text',
        success:function(response){
                $("#js_doc_list").html("<option >"+response+"</option>");
        }
    });
		
	});
	
});