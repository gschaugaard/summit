$(function(){
	$('#submit-form').click(function(e){
		e.preventDefault();
		$('#submit-form').hide();
		$('#process-form').show();

		var customer_info = $("#customer-info").val();
		if(customer_info == ''){
			$('#form-error').html('Please Input Data');
			$('#results').hide();
			$('#submit-form').show();
			$('#process-form').hide();
		}else{
			// post and handle data
			$.post("/summit/process.php", {input: customer_info}, function(result){
		        $('#name').html(result.name);
		        $('#phone').html(result.phone);
		        $('#email').html(result.email);
		        $('#address').html(result.address);
		        $('#results').show();
		        $('#submit-form').show();
				$('#process-form').hide();
	   		}, 'json');
		}
	    
	});
});