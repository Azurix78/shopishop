$('#command').click(function(){
	if(!$('#color').val())
	{
		$('#color').css('border', 'solid 1px red');
	}
	else
	{
		$('#color').css('border', 'none');
		if(!$('#size').val())
		{
			$('#size').css('border', 'solid 1px red');
		}
		else
		{
			$('#size').css('border', 'none');
			window.location = "/orders/addToCart/" + articles[$('#size option:selected').val()].Article.id;
		}
	}
});

$('#color').on('change',function(){
	$('#ref').html('');
	$('#size').html('');
	$('#command').attr('class','disable');
	$('#color').css('border', 'none');
	$.getJSON( "/articles/sizeArray/"+ $('#color').data('id') +"/"+ $('#color option:selected').html(), function( data ) {
		articles = data;
		items = [];
		items.push( "<option value=''></option>" );
		$.each( data, function( key, val ) {
			items.push( "<option value='" + key + "'>" + val.Article.size + "</option>" );
		});
		$('#size').html(items.join(''));
		$('.img-product').attr('src','/img/files/'+ articles[0].Picture.picture);
	});
});

$('#size').on('change',function(){
	$('#color').css('border', 'none');
	if($('#size option:selected').val()) $('#ref').html(articles[$('#size option:selected').val()].Article.reference);
	if($('#color').val() && $('#size').val())
	{
		$('#command').removeClass();
	}
	else
	{
		$('#command').attr('class','disable');
	}
});

$('.produitQuantity').on('change', function(){
    $.ajax({
        url : "/orders/changeCart/"+$(this).data('key'),
        dataType : 'JSON',
        type : 'POST',
        data : {quantity:$(this).val()},
        success: function(response){
            if(response)
            {
                location.reload();
            }
        } 
    });
});