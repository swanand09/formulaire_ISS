<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="fr">
  <head>  
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Formulaire ISS - <?php echo $template['title']; ?></title>   
    <!--    datatables    -->
    <?php
        echo css('bootstrap.css');
        echo css('DT_bootstrap.css');
        echo js("jquery-1.8.3.js");
        echo js("jquery.dataTables.js");
        echo js("DT_bootstrap.js");
        echo js("jquery-ui-1.9.2.custom.js");
        echo css("custom-theme/jquery-ui-1.9.2.custom.css");
    ?>
    <!-- Framework CSS -->
   <?php        
        echo css('blueprint/screen.css',NULL,array('media'=>'screen,projection'));
        echo css('blueprint/print.css',NULL,array('media'=>'print'));    
   ?>    
    <!--[if lt IE 8]>
       <?php   echo css('ie.css',NULL,array('media'=>'screen,projection'));  ?>
    <![endif]-->
       <?php 
            echo favicon("favicon.ico");
       ?>

  </head>
  <body>
   <!-- <div id="container showgrid">-->
    <div id="page">
      <div>
          <?php echo image('logo_mediaserv.png');?>            
      </div>
      <h3>ISS</h3>
    <!--  <div class="span-12">-->
       <div id="iss_contenu">       
           <?php echo $template['partials']['iss_contenu'];?>
       </div>  
    </div>
  </body>
</html>
