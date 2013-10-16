///////////[MASCARAS JQUERY]//////////	
$(document).ready(function(){
   jQuery(function($) {
	  $.mask.definitions['~']='[+-]';
	  $(".maskTel").mask("(99) 9999-9999");
	  $('.maskData').mask('99/99/9999');
	  /*$('#phoneext').mask("(999) 999-9999? x99999");
	  $("#tin").mask("99-9999999");
	  $("#ssn").mask("999-99-9999");
	  $("#product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
	  $("#eyescript").mask("~9.99 ~9.99 999");*/

	  $('.maskCelular').focusout(function(){
		var phone, element;
		element = $(this);
		element.unmask();
		phone = element.val().replace(/\D/g, '');
		if(phone.length > 10) {
			element.mask("(99) 99999-999?9");
		} else {
			element.mask("(99) 9999-9999?9");
		}
		}).trigger('focusout');
	 });
});

///////////[AUMENTAR E DIMINUIR FONTE]//////////	
$(document).ready(function(){
var fonte = 14;
	$('#aumenta_fonte').click(function(){
		if (fonte < 30){
			fonte = fonte + 1;
			$('.pgPadrao p, .pgPadrao a, .pgPadrao li, .pgPadrao tr').css({'font-size' : fonte + 'px'});
		}
	});
	$('#reduz_fonte').click(function(){
		if (fonte > 12){
			fonte = fonte - 1;
			$('.pgPadrao p, .pgPadrao a, .pgPadrao li, .pgPadrao tr').css({'font-size' : fonte + 'px'});
		}
	});	
});

///////////[ANIMAÇÃO BOTOES REDES SOCIAIS]//////////	
$(document).ready(function(){
	$(".facebook a,.twitter a")
		.mouseover(function(){
			$(this).animate().stop().animate({marginTop:"-44px"},300);
		})
		.mouseout(function(){
			$(this).animate({marginTop:"0px"},100);
	});
});
