$(function(){
	$('#submit-form').click(function(e){
		e.preventDefault();
		$('#submit-form').hide();
		$('#process-form').show();

		var customer_info = $("#customer-info").val();
		if(customer_info == ''){
			$('#submit-form').show();
			$('#process-form').hide();
		}
	    $.post("/summit/process.php", {input: customer_info}, function(result){
	        console.log(result);
	        $('#name').html(result.name);
	        $('#phone').html(result.phone);
	        $('#email').html(result.email);
	        $('#address').html(result.address);
	        $('#results').show();
	        $('#submit-form').show();
			$('#process-form').hide();
   		}, 'json');
	});
});