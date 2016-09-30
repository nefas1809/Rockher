//console.log("mostrando");
clearModal();
var arrayTallas = ["Tallas_ninas", "Tallas_damas", "Tallas_bebe","Tallas_extras", "Tallas_ninas_y_extras", "Tallas_damas_y_extras"];
var tipoTalla;
var arrayColores = [];
var arrayTallasCirculos = [];
var arrayEstilos = [];
var selectEstilo = false;
var selectColor = false;
var selectTalla = false;
$('table.variations > tbody > tr').each(function(){
	var label = $(this).children(':first-child').find('label').text();
	
	//console.log("label: "+label);
	if(label === 'Colores'){

		$(this).children(':nth-child(2)').find('select > option').each(function(index){
			if(index != 0){
				var valor = $(this).text();
				var color = $(this).val();

				console.log('Color: '+color+" index: "+index+" value: "+valor);
				if($('div#colores').find('#'+valor).length <= 0){
					$('div#colores').append("<div class='circle circle-color' style='background-color: #"+color+";' id='"+valor+"'></div>");
				}
				
				
			}
		});
		//console.log("Es color");
	}else if( $.inArray(label,arrayTallas) >= 0)/*label === 'Tallas_bebes' || label === 'Tallas_ninas' || label === 'Tallas_damas' || label === 'Tallas_extras')*/{
		tipoTalla = label.toLowerCase();
		//console.log("Es talla: "+label+" y tipoTalla: "+tipoTalla);
		$(this).children(':nth-child(2)').find('select > option').each(function(index2){
			if(index2 != 0){
				var color = $(this).text();
				var valor = $(this).val();

				console.log('Talla: '+label+' , '+color+" index: "+index2+" value: "+valor);
				if($('div#tallas').find('#'+color).length <= 0){
					$('div#tallas').append("<div class='circle circle-talla' style='background-color: "+color+"';' id='"+valor+"'><span class='center-text'>"+color+"</span></div>");
				}
				
				
			}else{
				console.log("es 0");
			}
		});
		

	}else if(label === "Estilos"){
		$(this).children(':nth-child(2)').find('select > option').each(function(index3){
			if(index3 != 0){
				var color = $(this).text();
				var valor = $(this).val();

				console.log('Estilo: '+color+" index: "+index3+" value: "+valor);
				if($('div#estilos').find('#'+valor).length <= 0){
					$('div#estilos').append("<div class='col-md-3'><div class='img-estilo' id='"+valor+"'><i class='fa fa-check-circle' aria-hidden='true'></i></div><span>"+valor+"</span></div>");
				}
				
			}
		});
	}
});



var array = new Array();
$("#colores").on("click",".circle-color", function(){
	$("div.circle-color").empty();
	$(this).append('<i class="fa fa-check" aria-hidden="true" style="color:#E7E7E7;"></i>');
	//$("#cantidad > form").find("#pa_colores option:selected").removeAttr("selected");
	$("#pa_colores option:selected").removeAttr("selected");
	$("#pa_colores option").each(function(){
		var valor = $(this).val();
		var texto = $(this).text();
		
		if(valor != ""){
			console.log("valor: "+valor+", texto: "+texto);
			if($.inArray(texto,array) !== -1){
			}else{
				console.log("no lo contiene");
				array[texto] = valor;
			}
		}
		
		$(this).removeAttr("selected").change();
	});

	console.log("del arreglo: "+array[this.id]);

	//console.log("color del div: "+hexc($(this).css('background-color')));
	//$("#cantidad > form").find("#pa_colores").val(array[this.id]).attr("selected","selected").change();
	$("#pa_colores").val(array[this.id]).attr("selected","selected").change();
	setPrecio();
	recargar_estilos($( "#pa_estilos option:selected" ).val());
	recargar_tallas($( "#pa_"+tipoTalla+" option:selected" ).val());
	selectColor = true;
	mostrarBotonLimpiar(true);
	//$("#pa_colores option[text='"+texto+"'").attr("selected", "selected").change();
	/*$("#pa_colores option").each(function(){
		if($(this).text() === texto){
			console.log("es igual, "+ $(this).val()+", "+$(this).text());
			$(this).change();
		}
		else{
			$(this).removeAttr("selected").change();
		}
		console.log("ELEMENTO: "+$(this).text());
	});*/
	/*if($("#pa_colores option").text() === texto){
		console.log("es igual");
		
	}
	console.log($("#productInfoImg").find(".woocommerce-variation-price span.price").text());
	$("#precio h4").text($("#productInfoImg").find("div.summary .woocommerce-variation-price").text()+" MXN");*/
});

var precio;

function setPrecio(){
	precio = $("#productInfoImg").find("div.summary .woocommerce-variation-price").text();
	if(precio === ""){
		$("#precio h4").text("$0.00 MXN");
		
	}else{
		$("#precio h4").text(precio+" MXN");	
	}
}

$("#tallas").on("click",".circle-talla", function(){
	$("div.circle-talla").css({"background-color":"#fff", "color":"#cccccc"});
	$("div.circle-talla > span").css("color","#cccccc");
	$(this).css({"background-color":"#cccccc", "color":"#fff"});
	$(this).find("span").css("color","#fff");
	//$("#cantidad > form").find("#tallas option").each(function(){
	$("#pa_"+tipoTalla).each(function(){
		$(this).removeAttr("selected").change();
	});
	$("#pa_"+tipoTalla).val(this.id).attr("selected","selected").change();
	//$("#cantidad > form").find("#tallas").val(this.id).attr("selected","selected").change();
	setPrecio();
	recargar_colores($( "#pa_colores option:selected" ).text());
	recargar_estilos($( "#pa_estilos option:selected" ).val());
	selectTalla = true;
	mostrarBotonLimpiar(true);
	console.log();

	
});

$("#estilos").on("click",".img-estilo",function(){
	$("div.img-estilo").css("opacity",".5");
	$("div.img-estilo > i").css("opacity","0");
	$(this).css("opacity","1")
	$(this).find("i").css("opacity","1");
	//$("#cantidad > form").find("#tallas option").each(function(){
	$("#pa_estilos option").each(function(){
		$(this).removeAttr("selected").change();
	});
	$("#pa_estilos").val(this.id).attr("selected","selected").change();
	setPrecio();
	recargar_colores($( "#pa_colores option:selected" ).text());
	recargar_tallas($( "#pa_"+tipoTalla+" option:selected" ).val());
	mostrarBotonLimpiar(true);
	selectEstilo = true;
	//$("#cantidad > form").find("#tallas").val(this.id).attr("selected","selected").change();
	/*console.log($("#productInfoImg").find("div.summary .woocommerce-Price-amount").text());
	$("#precio h4").text($("#productInfoImg").find("div.summary .woocommerce-variation-price").text()+" MXN");*/
});

$("#agregar > a").click(function(e){
			console.log("Presiono el de añadir al carro");
			e.preventDefault();
			if(!selectEstilo){
				sweetAlert("Oops...", "Necesitas seleccionar un estilo de prenda!", "error");
				//that.on("click",addToCart);
			}else if(!selectColor){
				sweetAlert("Oops...", "Necesitas seleccionar un color de prenda!", "error");
				//that.on("click",addToCart);
			}else if(!selectTalla){
				sweetAlert("Oops...", "Necesitas seleccionar una talla!", "error");
			}else{
				$("#myModal").find("button.single_add_to_cart_button").click();
				console.log("se encontro el boton");
				selectTalla = false; selectColor = false; selectEstilo = false;
				swal("Productos agregados al carrito!", "", "success");

			}

			
			
		});

function clearModal(){
	$('div#colores').empty();
	$('div#tallas').empty();

}

function recargar_colores($idColor){
	/*var temp = [];
	$("#pa_colores option").each(function(){
		var color = $(this).val();
		temp.push(color);
	});
	if(arrayColores.length != temp.length){
		console.log("debo recargargar los colores, han cambiado los combos");
		console.log("Tamaño de arrayColores: "+arrayColores.length+" y tamaño de temp: "+temp.length);
		*/
		$('div#colores').empty();

		$("#pa_colores option").each(function(index){
			if(index != 0){
				var valor = $(this).text();
				var color = $(this).val();
				if($('div#colores').find('#'+valor).length <= 0){
					//arrayColores.push(valor);
					$('div#colores').append("<div class='circle circle-color' style='background-color: #"+color+";' id='"+valor+"'></div>");
				}
			}
		});
		$("#"+$idColor).append('<i class="fa fa-check" aria-hidden="true" style="color:#E7E7E7;"></i>');
		
		/*arrayColores = temp;
	}*/

}

function recargar_tallas($idTalla){
	/*var temp = [];
	$("#pa_"+tipoTalla+"  option").each(function(){
		var color = $(this).val();
		temp.push(color);
	});
	if(arrayTallasCirculos.length != temp.length){
		console.log("debo recargargar las tallas, han cambiado los combos");
		console.log("Tamaño de arrayTallasCirculos: "+arrayTallasCirculos.length+" y tamaño de temp: "+temp.length);
		*/
		$('div#tallas').empty();
		$("#pa_"+tipoTalla+"  option").each(function(index){
			if(index != 0){
				var color = $(this).text();
				var valor = $(this).val();
				if($('div#tallas').find('#'+color).length <= 0){
					$('div#tallas').append("<div class='circle circle-talla' style='background-color: "+color+"';' id='"+valor+"'><span class='center-text'>"+color+"</span></div>");
				}
			}
		});
	$("div.circle-talla").css({"background-color":"#fff", "color":"#cccccc"});
	$("div.circle-talla > span").css("color","#cccccc");
	$("#"+$idTalla).css({"background-color":"#cccccc", "color":"#fff"});
	$("#"+$idTalla).find("span").css("color","#fff");
		/*
		arrayTallasCirculos = temp;
	}*/

}


function recargar_estilos($idEstilo){
	/*var temp = [];
	$("#pa_estilos  option").each(function(){
		var color = $(this).val();
		temp.push(color);
	});
	if(arrayEstilos.length != temp.length){
		console.log("debo recargargar los estilos, han cambiado los combos");
		console.log("Tamaño de arrayEstilos: "+arrayEstilos.length+" y tamaño de temp: "+temp.length);
		*/
		$('div#estilos').empty();
		$("#pa_estilos option").each(function(index){
			if(index != 0){
				var color = $(this).text();
				var valor = $(this).val();
				if($('div#estilos').find('#'+valor).length <= 0){
				$('div#estilos').append("<div class='col-md-3'><div class='img-estilo' id='"+valor+"'><i class='fa fa-check-circle' aria-hidden='true'></i></div><span>"+valor+"</span></div>");
			}
			}
		});
		$("div.img-estilo").css("opacity",".5");
		$("div.img-estilo > i").css("opacity","0");
		$("#"+$idEstilo).css("opacity","1")
		$("#"+$idEstilo).find("i").css("opacity","1");
		/*
		arrayEstilos = temp;
	}*/
	/*$('div#estilos').empty();
	$("#pa_estilos option").each(function(index){
		if(index != 0){
			var valor = $(this).text();
			var estilo = $(this).val();
			
		}
	});*/

}

function mostrarBotonLimpiar($visible){
	if($visible){
		$("div#reiniciar").show();	
	}else{
		$("div#reiniciar").hide();
	}
	
}



$("div#reiniciar > a").click(function(e){
	e.preventDefault();
	$(".reset_variations").click();
	mostrarBotonLimpiar(false);
	recargar_colores();
	recargar_tallas();
	recargar_estilos();
	$("div.img-estilo").css("opacity",".5");
	$("div.img-estilo > i").css("opacity","0");
	$("div.circle-talla").css({"background-color":"#fff", "color":"#cccccc"});
	$("div.circle-talla > span").css("color","#cccccc");
	$("div.circle-color").empty();
	$(".inputTalla").val(0);
	selectTalla = false; selectColor = false; selectEstilo = false;
});

/*function crearCirculoTalla($talla, $contenedor){
	$(contenedor).append("<div class='col-md-3'><div class='img-estilo' id='"+talla+"'><i class='fa fa-check-circle' aria-hidden='true'></i></div><span>"+talla+"</span></div>");
}*/

$("#pa_colores").change(function(){
	var idColor = $( "#pa_colores option:selected" ).text();
	console.log("ELEMENTO DE COLOR SELECCIONADO: "+idColor);
	recargar_colores(idColor);
});

$("#pa_"+tipoTalla).change(function(){
	var idTalla = $( "#pa_"+tipoTalla+" option:selected" ).val();
	console.log("ELEMENTO DE LA TALLA SELECCIONADO: "+idTalla);
	recargar_tallas(idTalla);
});

$("#pa_estilos").change(function(){
	var idEstilo = $( "#pa_estilos option:selected" ).val();
	console.log("ELEMENTO DE COLOR SELECCIONADO: "+idEstilo);
	recargar_estilos(idEstilo);
});

/*function crearCirculoTalla($talla, $contenedor){
	$(contenedor).append("<div class='col-md-3'><div class='img-estilo' id='"+talla+"'><i class='fa fa-check-circle' aria-hidden='true'></i></div><span>"+talla+"</span></div>");
}*/


