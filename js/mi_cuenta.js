console.log("vamo a busca inputs");
$(".form-row").find("input").each(function(){
	if($(this).prop('type') === "submit"){
		$(this).addClass(" button alt").css({"margin-top":"35px", "float":"right"});
	}
});



var etq;
var placeHolder;
var tipos = ["text", "email", "password"];
placeHolder($("form.register"));
placeHolder($("form.login"));
function placeHolder(element){
	$(element).find("p").each(function(){
		if($(this).find("label").length > 0){
			$(this).find("label").each(function(){
				etq = $(this).text();
				console.log("ETQ: "+etq);
				//$(this).hide();

				if($(this).parent().find("input").length > 0){
					console.log("imput encontrado");
					$(this).parent().find("input").each(function(){
						if($.inArray($(this).prop('type'),tipos) >= 0){
							$(this).attr("placeholder",etq);
							$(this).addClass("futura italic22");
			        		//inputPlaceholder($(this));
						}
					});
					
				}
				$(this).hide();
			});


			
		}
	
	});
}

$("p.lost_password > a").text("Olvidé mi contraseña").addClass("futura normal22 toUppercase");
var separador = "<div class='separador'></div>"
$(separador).insertAfter("#customer_login > div.u-column1");
var alturaSeparador = $("div.u-column2").height()-50;
$(".separador").css({"height":alturaSeparador, "margin":"auto 60px"});

$(document).ready(function(){

	/*ESTO ES PARA LAS DIRECCIONES, EDITAR DIRECCIONES*/

	$("div.woocommerce-MyAccount-content > p, .woocommerce-EditAccountForm").addClass("futura normal22");
	$("address").addClass("futura normal22");
	$(".woocommerce-Message").addClass("futura normal22");
	$(".woocommerce-MyAccount-content > form > div > p > label").addClass("futura italic22");
	$(".woocommerce-MyAccount-content > form > div > p > input").addClass("futura normal22").css("opacity",".5");
	$("#select2-chosen-1, #select2-chosen-2").addClass("futura normal22").css("opacity",".5");
	$("#select2-results-1, #select2-results-2").addClass("futura normal22").css("opacity",".5");
	$("#billing_country_field").css("height","87.6px");
	$(".woocommerce-MyAccount-content > form > div > input.button").css({"opacity":"1","margin-top":"30px", "float":"right", "margin-bottom":"30px"});
	$("#billing_address_2_field").detach().appendTo("#billing_address_1_field");
	var alturaCity = $("#billing_address_1_field").height()+10;
	$("#billing_city_field").css("height",alturaCity);
	$(".woocommerce-MyAccount-content > form > div > p").each(function(){
		$(this).addClass("col-md-6").removeClass("form-row-first form-row-last form-row-wide").css({"padding":"3px 10px 3px 30px", "margin-top":"15px"});
	});
	$(".woocommerce-MyAccount-content > form > div > .clear").css("display","none");
	if($(window).width() <= 815){
		//$(".separador").height(0);
		$(".separador").css({"height":0, "margin":"40px auto"});
	}

	$(window).resize(function(){
		if($(window).width() <= 815){
			$(".separador").css({"height":0, "margin":"40px auto"});
			//$(".separador").height(0);
		}else{
			$(".separador").css({"height":alturaSeparador, "margin":"auto 60px"});
			//$(".separador").height(alturaSeparador).width($("div.u-column2"));
		}
	});



});



/*$("form.register").find("p").each(function(){
	if($(this).find("label").length > 0){
		$(this).find("label").each(function(){
			etq = $(this).text();
			//$(this).hide();

			if($(this).parent().find("input").length > 0){
				console.log("imput encontrado");
				$(this).parent().find("input").each(function(){
					if($.inArray($(this).prop('type'),tipos) >= 0){
						$(this).attr("placeholder",etq);
						$(this).addClass("futura");
		        		//inputPlaceholder($(this));
					}
				});
				
			}
			$(this).hide();
		});


		
	}
	
});


function inputPlaceholder(input){ 
    var value = input.val();
    input.focus( function(){
        if( $.trim(input.val()) == value ){ input.val(''); }
    });
    input.blur( function(){
        if( $.trim(input.val()) == '' ){ input.val(value); }
    });
}*/