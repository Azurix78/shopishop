$('.chooseImg img').click(function(){
	$('.chooseImg img').css('border', 'none');
	$(this).css('border', 'solid 2px #dc92df');
	$('.img').val($(this).data('id'));
});