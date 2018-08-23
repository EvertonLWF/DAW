$(function(){
	var cont = 0;
	$('.btn').bind('click',function(){
		$('#form').html($('#form').html()+"<br/><input type ='file' name = 'foto"+cont+"'>");
		cont++;

		// var input = $('#arquivo').clone();
		// $(input).insertAfter("h4");
	});
});