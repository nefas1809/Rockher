<?php
/*
Theme Name: WPBootstrap
Theme URI: http://geekpurple.com/
Description: Plantilla demo para el post  <a href="http://geekpurple.com/crear-una-plantilla-de-wordpress-con-bootstrap/">Como hacer una plantilla para WordPress usando Bootstrap</a>.
Author: Yolanda Jimenez
Author URI: http://geekpurple.com/
Version: 1.0
Tags: wordpress, blog, bootstrap

Este tema ha sido creado basandonos en los ejemplos de Bootstrap para crear una web
*/
?>

<?php 
/**
 * Template Name: Home template
 *
 *
 * Template general para el home
 */
 get_header(); ?>
<!--Body content-->
            
      <div class="row" id="galeria">
         <!--<h1>Guía de uso Bootstrap en GeekPurple</h1>
         <p>Estamos haciendo un ejemplo sencillo para empezar a trabajar con Bootstrap.</p>
         
        <?php echo do_shortcode('[wonderplugin_slider id="1"]'); ?>-->
        <?php echo do_shortcode("[metaslider id=11]"); ?>

      </div>
       
      <div class="row" id="contedorMenuCentral">
      <!-- para resoluciones grandes-->
      <div class="row" id="menuCentral">
        <div class="" id="armaPedido"><div id="armaPedido2"><img class="img_back" src="<?php bloginfo('template_url'); ?>/img/armaPedido1.jpg" alt=""></div></div>
        <div class="" id="comoComprar"><img class="img_back" src="<?php bloginfo('template_url'); ?>/img/comoComprar.jpg" alt=""></div>
        <div class="" id="loNuevo"><img class="img_back" src="<?php bloginfo('template_url'); ?>/img/masNuevo.jpg" alt=""></div>
      </div>



      <div class="modal fade" tabindex="-1" role="dialog" id="myModal2">
  <div class="modal-dialog container">
    <div class="modal-content row">
      <div class="modal-header">
        
      </div>
      <div class="modal-body row">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-times-circle" aria-hidden="true"></i>
        <!--<span aria-hidden="true">&times;</span>--></button>
        <iframe width="100%" height="400" src="https://www.youtube.com/embed/fDrTbLXHKu8" frameborder="0" allowfullscreen></iframe>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      <!-- para resoluciones ipad-->
      




      <div class="row" id="contenedorDesplegable">
        <div class="row" id="pedidoDesplegable">
        <div id="pedidoFront">
          <img src="<?php bloginfo('template_url'); ?>/img/frontPrint.jpg" alt="">
        </div>
        <div id="pedidoFull">
          <img src="<?php bloginfo('template_url'); ?>/img/fullPrint.jpg" alt="">
        </div>
        <div id="pedidoSudadera">
          <img src="<?php bloginfo('template_url'); ?>/img/sudaderas.jpg" alt="">
        </div>
        <div id="pedidoSpring">
          <img src="<?php bloginfo('template_url'); ?>/img/temporada.jpg" alt="">
        </div>
        </div>
      </div>
        
        
        
      </div>


      <div class="col-md-12" id="banner_lookbook">
       <img src="<?php bloginfo('template_url'); ?>/img/lookbook.jpg" alt="" class="img_backLook">
      </div>


    </div> <!--div del contenedor del contenido principal-->
    <!--</div><!--div del contenedor padre (abarca contenido principal y menu)-->
<script>
      $("#armaPedido2").click(function(){
        if($("#armaPedido").hasClass("pressed")){
            $("#armaPedido").removeClass("pressed");
            setTimeout(function(){
              $("#pedidoFront").addClass("ocultarPedidoFront");
            },150);
            setTimeout(function(){
              $("#pedidoFull").addClass("ocultarPedidoFull");
            },250);
            setTimeout(function(){
              $("#pedidoSudadera").addClass("ocultarPedidoSudadera");
            },350);
            setTimeout(function(){
              $("#pedidoSpring").addClass("ocultarPedidoSpring");
            },450);
            setTimeout(function(){
              $("#armaPedido > #pedidoFront, #armaPedido > #pedidoFull, #armaPedido > #pedidoSpring, #armaPedido > #pedidoSudadera").remove();
              
            },800);
            setTimeout(function(){
              $("#armaPedido").removeClass("row").addClass("col-md-4").css({display:"block", width:"33.3%"}).fadeIn('slow',function(){
                 $("#armaPedido div").animate({width: "100%"},500);
                 $("#armaPedido2 img").attr("src","<? bloginfo("template_url"); ?>/img/armaPedido1.jpg");
              });
              $("#armaPedido2 img").attr("src","<? bloginfo("template_url"); ?>/img/armaPedido1.jpg").stop(true,true).hide().fadeIn('slow');
              $("#comoComprar").css("width","33.3%").show("slow");
              $("#loNuevo").css("width","33.3%").show("slow");
            },900);
            



        }else{
          $("#armaPedido").addClass("pressed");

          //ocultar los otros 2 elementos, el de lo mas vendido y como comprar
          $("#comoComprar, #loNuevo").css("display","none");
              $("#armaPedido").removeClass("col-md-4").addClass("row").css({width:"100%", display:"flex"});
              $("#armaPedido div").animate({width: "20%"},600);
              $("#armaPedido2 img").attr("src","<? bloginfo("template_url"); ?>/img/armaPedido2.jpg").stop(true,true).hide().fadeIn('slow', function(){
                console.log("nionoinxiwe");
                  $("#pedidoSpring").clone().appendTo("#armaPedido").addClass("mostrarPedidoSpring");
                  setTimeout(function(){
                    $("#pedidoSudadera").clone().appendTo("#armaPedido").addClass("mostrarPedidoSudadera");
                  },200);
                  setTimeout(function(){
                    $("#pedidoFull").clone().appendTo("#armaPedido").addClass("mostrarPedidoFull");
                  },250);
                  setTimeout(function(){
                    $("#pedidoFront").clone().appendTo("#armaPedido").addClass("mostrarPedidoFront");
                  },300);
              });
              
              //$(pedidoFull).appendTo(this);
              //$("#armaPedido").fadeIn(500);
            
            //$("#armaPedido").removeClass("col-md-4").addClass("row").children(":first-child").animate({width: "20%"}); 
            
          //});
          


          /*$("#armaPedido").fadeOut(1000, function(){
            $("#armaPedido").removeClass("col-md-4").addClass("row");
            $("#armaPedido img").attr('src','<? bloginfo("template_url"); ?>/img/armaPedido2.jpg');
            $("#armaPedido").fadeIn({queue: false, duration:"slow"}); 
            $("#armaPedido").children(":first-child").animate({width: "20%"},'slow'); //css("width","20%");
            
             
          });
          
          $("#comoComprar, #loNuevo").addClass("hideDivs");
          $("#armaPedido").addClass("pressed");*/
          //$("#contenedorDesplegable").addClass("mostrarPedido");
          //$("#contenedorDesplegable").addClass("showDesplegable");
          
        }
      });

      $("#comoComprar").click(function(){
        $("#myModal2").modal("show");
      });
    </script>
<?php get_footer(); ?>
