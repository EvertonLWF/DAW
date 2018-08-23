$(function(){
	$('.corpo').hide();
	$('.editar').hide();
	$('.cadastro').hide();
	$('#btn4').hide();
	$('#cad').bind('click', function(){
		$('.cadastro').fadeToggle('slow');
	});
	$('#btn1').bind('click',function(){
		$('.corpo').slideToggle('slow');
	});
	$('#btn2').bind('click',function(){
		$('.editar').slideToggle('slow');
		$('#btn4').slideToggle('slow');
	});
	$('#btn3').bind('click',function(){
		$(location).attr('href','logout.php');
	});
	$('#btn4').bind('click',function(){
		$(location).attr('href','deletar.php');
	});
	
});
function load(){
	alert("Voce esqueceu de preencher algum campo!!!!!");
}
function jaExiste(){
	alert("este email ja existe!!!!!");
}