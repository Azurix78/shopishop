$('.re-upload a').click(function(){
	$('#upload').click();
	$('#form-upload').attr('action', '/adminpictures/reupload/'+$(this).data('picture'));
});

$('#upload').on('change', function(){
	$('#form-upload').submit();
});