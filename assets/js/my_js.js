
$(document).ready(function(){

	populate_queue_list();

	$('input[name="type"]').on('change', function() {
		
		var type_id =  $(this).val();

		if(type_id == 1){

			$("#t_2").hide();
			$("#t_1").show();
			$('#Name').removeAttr('required');
			$('#FirstName').attr('required', 'required');
			$('#LastName').attr('required', 'required');
			$('#title').attr('required', 'required');

		}else{

			if(type_id == 2){

				$("#t_1").hide();
				$("#t_2").show();
				$('#FirstName').removeAttr('required');
				$('#LastName').removeAttr('required');
				$('#title').removeAttr('required');
				$('#Name').attr('required', 'required');

			}else{

				$("#t_1").hide();
				$("#t_2").hide();
				$('#FirstName').removeAttr('required');
				$('#LastName').removeAttr('required');
				$('#title').removeAttr('required');
				$('#Name').removeAttr('required');
			}
		}
	});

	$("#queue").on('submit', function(){
		
		event.preventDefault();

		var type_id    = $('input[name="type"]:checked').val();
		var title_id   = $('#title').val();
		var service_id = $('input[name="service"]:checked').val();
		var FirstName  = $('#FirstName').val();
		var LastName   = $('#LastName').val();
		var Name   	   = $('#Name').val();
		
		$.ajax({
            type: 'post',
            url: base_url + '/assets/ajax/InsertQueue.php',
            data: {service:service_id,type:type_id,title:title_id,FirstName:FirstName,LastName:LastName,Name:Name},
            success: function (res) { 
            	if(res == 1){
            		populate_queue_list();
            		document.queue.reset();	
            	}else{
            		alert("Something is going wrong, please check your data and try again!");
            	}
            }
        }); 
	});

	function populate_queue_list(){
		$.ajax({
            type: 'post',
            url: base_url + '/assets/ajax/populate_queue_list.php',
            success: function (res) { 
                $('#populate_queue_list').html(res);
                $("#populate_table_queue_list").DataTable();
            }
        }); 
	}
});
