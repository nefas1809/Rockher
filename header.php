<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Le styles -->
    

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">

   
<!--<?php wp_enqueue_script("jquery"); ?>-->

<?php wp_head(); ?>
<!--<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">-->
    <!--<script src="http://code.jquery.com/jquery.js"></script>   -->
    <!--<script src="<?php get_template_directory_uri() . '/js/jquery.js'?>"></script>
    <script src="<?php get_template_directory_uri() . '/js/bootstrap.js'?>"></script>
    <script src="<?php get_template_directory_uri() . '/js/eventosTallas.js'?>"></script>
    <!--<script>
      $(document).ready(function(){
         $('.carousel').carousel();
      });
    </script>-->

  <script>
    $(document).ready(function(){
      $("div.arrow_box").hide();
      $("ul.nav li").each(function(){
        if($(this).children(":first-child").text() === "Lo + vendido"){
          $(this).children(":first-child").addClass("loMasVendido");
        }else if($(this).children(":first-child").text() === "Rebajas"){
          $(this).children(":first-child").addClass("rebajas");
        }else if($(this).children(":first-child").text() === "Dudas frecuentes"){
          $(this).children(":first-child").addClass("dudas");
        }else if($(this).children(":first-child").text() === "Mi cuenta"){
          $(this).children(":first-child").addClass("perfil").text('').append("<i class='fa fa-user' aria-hidden='true'></i>");
          <? if(is_user_logged_in()){ 
          ?>
                <?
                  global $current_user;
                  get_currentuserinfo();
                ?>
                  var userName = '<?=$current_user->user_login ?>';
                  console.log(userName);
                  $("div.arrow_box > h3").text("¡Bienvenid@ "+userName+"!");
            console.log("estas logueado");
            $(this).children(":first-child").children(":first-child").css("color","yellow");
            <?if (is_home() || is_front_page()){ ?>
                setTimeout(function(){
                  $("div.arrow_box").css({
                    position: "absolute",
                    left: $("i.fa-user").offset().left - ($("div.arrow_box").width()/2) +10,
                    top: $("ul.nav").offset().top + $("ul.nav").height()+5}).slideToggle("slow");
                },3500);
                
                setTimeout(function(){
                  $("div.arrow_box").slideToggle("slow");
                  console.log("algo");
                },10000);
                
            <?
              }

            } 
            ?>
          
        }else if($(this).children(":first-child").text() === "Carrito de compra"){
          $(this).children(":first-child").addClass("carro").text('').append("<i class='fa fa-shopping-basket' aria-hidden='true'></i>");
        }else if($(this).children(":first-child").text() === "Contacto"){
          $(this).children(":first-child").text('').append("<i class='fa fa-envelope' aria-hidden='true'></i>");
        }else if($(this).children(":first-child").text() === "Pago"){
          $(this).hide();
        }
      });

      <?
        if(!is_product()){

      ?>
          $("i.fa-user").hover(
          function(){
            $("div.arrow_box").css({
                position: "absolute",
                left: $("i.fa-user").offset().left - ($("div.arrow_box").width()/2) +10,
                top: $("ul.nav").offset().top + $("ul.nav").height()+5}).slideToggle("slow");
          },
          function(){
            $("div.arrow_box").slideToggle("slow");
          }
        );


      <?
        }
      ?>
      

      /*$("ul.nav > li > a").wrap('<div class="agrupar"/>');
      $("<span class='separador' ></span>").insertAfter("ul.nav > li >.agrupar > a");*/
    });
  </script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php bloginfo('url'); ?>"><img id="logo-img" src="<?php bloginfo('template_url'); ?>/img/logoRockher.png" alt=""/></a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <?php wp_list_pages(array('title_li' => '')); ?>
            <span><a href="#"><img id="logo2-img" src="<?php bloginfo('template_url'); ?>/img/ducky.png" alt=""></a></span>
          </ul>
          
        </div><!-- /.navbar-collapse -->
        
      </div><!-- /.container-fluid -->

    </nav>
    <!--<div id="padre" class="wrapper">-->
    <!--<div id="menu">
      <? wp_nav_menu(array( 'theme_location' => 'menu' )); ?>
    </div>-->
    <div class="arrow_box">
      <h3>
        
      </h3>
    </div>
    <div class="container" style="<?php
      $titulo =  get_the_title();
      if($titulo != "Inicio"){
        ?> top:70px;"
      <?php } ?>" id="principal">
      