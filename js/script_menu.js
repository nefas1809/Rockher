/*$(document).ready(function(){

  if($("button#botonMenu").is(":visible")){
            $(".menuPr").hide();
  }
  $(window).resize(function(){
    if($("button#botonMenu").is(":visible")){
        $(".menuPr").hide();
    }else{
      $(".menuPr").show();
    }
    if($(window).width() <= 815){
      if($(".menuPr:not(:contains('.cont-btn,#logoPato'))")){
        $(".cont-btn").detach().appendTo(".menuPr");
        $("#logoPato").detach().insertAfter(".menuPr > .cont-btn");
      }
    }else{
      if($(".menuPr:contains('.cont-btn')")){
        $("#mi-cuenta").before($(".cont-btn"));
        $("#logoPato").detach().insertAfter($("#contacto"));
      }
    }

    
  });
  <?php if(!is_product()){ ?>
    $("button#botonMenu").click(function(){
      $(".menuPr").slideToggle();
    });
 <?php  
  }
  ?>
        

  if($(window).width() <= 815){
    if($(".menuPr:not(:contains('.cont-btn'))")){
      $(".cont-btn").detach().appendTo(".menuPr");
      $("#logoPato").detach().insertAfter(".menuPr > .cont-btn");
    }
  }

});*/