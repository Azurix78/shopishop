$('.address-item').click(function(){
	$('#order-address-lastname').val($(this).data('lastname'));
	$('#order-address-firstname').val($(this).data('firstname'));
	$('#order-address-address').val($(this).data('address'));
	$('#order-address-zipcode').val($(this).data('zipcode'));
	$('#order-address-country').val($(this).data('country'));
});

$('#livraison-order-next').click(function(){
	if(
		$('#order-address-email').val().length != 0 &&
		$('#order-address-lastname').val().length != 0 &&
		$('#order-address-firstname').val().length != 0 &&
		$('#order-address-address').val().length != 0 &&
		$('#order-address-zipcode').val().length != 0 &&
		$('#order-address-country').val().length != 0
	)
	{
	    $.ajax({
	        url : "/orders/addressOrder/",
	        dataType : 'JSON',
	        type : 'POST',
	        data : {
	        	email: $('#order-address-email').val(),
	        	lastname: $('#order-address-lastname').val(),
	        	firstname: $('#order-address-firstname').val(),
	        	address: $('#order-address-address').val(),
	        	zipcode: $('#order-address-zipcode').val(),
	        	country: $('#order-address-country').val()
	        	},
	        success: function(response)
	        {
	            if(response)
	            {
					$('#recap-order').css('display', 'none');
					$('#livraison-order').css('display', 'none');
					$('#paiement-order').css('display', 'block');

					$('#recap-ariane').removeClass('tunnel-current');
					$('#recap-ariane').addClass('tunnel-pass');

					$('#livraison-ariane').removeClass('tunnel-current');
					$('#livraison-ariane').addClass('tunnel-pass');

					$('#paiement-ariane').addClass('tunnel-current');
	            }
	        } 
	    });

	}
	else
	{

	}
});

$('#recap-order-next').click(function(){
	$('#recap-order').css('display', 'none');
	$('#livraison-order').css('display', 'block');

	$('#recap-ariane').removeClass('tunnel-current');
	$('#recap-ariane').addClass('tunnel-pass');

	$('#livraison-ariane').addClass('tunnel-current');
});


$( ".paiement-item input" ).on( "click", function() {
	if($( "input:checked" ).val() == "CB")
	{
		$('#CB').css('display', 'block');
	}
	else
	{
		$('#CB').css('display', 'none');
	}
});


$('#paiement-order-next').click(function(){
	if($( "input:checked" ).val() == "CB")
	{
		if(
			$('#order-cb-num').val().length != 0 &&
			$('#order-cb-crypto').val().length != 0
		)
		{
			$('#recap-order').css('display', 'block');
			$('#livraison-order').css('display', 'none');
			$('#paiement-order').css('display', 'none');

			$('#recap-ariane').removeClass('tunnel-current');
			$('#recap-ariane').addClass('tunnel-pass');

			$('#livraison-ariane').removeClass('tunnel-current');
			$('#livraison-ariane').addClass('tunnel-pass');

			$('#paiement-ariane').removeClass('tunnel-current');
			$('#paiement-ariane').addClass('tunnel-pass');

			$('#fin-ariane').addClass('tunnel-current');
		}
	}
	else if($( "input:checked" ).val() == "NO")
	{
		$('#recap-order').css('display', 'block');
			$('#livraison-order').css('display', 'none');
			$('#paiement-order').css('display', 'none');

			$('#recap-ariane').removeClass('tunnel-current');
			$('#recap-ariane').addClass('tunnel-pass');

			$('#livraison-ariane').removeClass('tunnel-current');
			$('#livraison-ariane').addClass('tunnel-pass');

			$('#paiement-ariane').removeClass('tunnel-current');
			$('#paiement-ariane').addClass('tunnel-pass');

			$('#fin-ariane').addClass('tunnel-current');
	}
});


