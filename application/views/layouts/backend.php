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
        echo css('themes/custom-theme/jquery.ui.all.css');
       	echo js("ui/jquery.ui.core.js");
	echo js("ui/jquery.ui.widget.js");
        echo js("ui/jquery.ui.mouse.js");
        echo js("ui/jquery.ui.button.js");
        echo js("ui/jquery.ui.draggable.js");
        echo js("ui/jquery.ui.position.js");
        echo js("ui/jquery.ui.resizable.js");
        echo js("ui/jquery.ui.dialog.js");
        echo js("ui/jquery.ui.effect.js");
        
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
    <script>
	$(function() {
		var name = $( "#name" ),
		    prenom = $( "#prenom" ),
                    email = $( "#email" ),
		    password = $( "#password" ),
                    confirm_password = $( "#confirm_password" ),
                    type1 = $( "#type_group1" ),
                    type2 = $( "#type_group2" ),
                    type_val = '',
                    allFields = $( [] ).add( name ).add( email ).add( password ).add(prenom),
		    tips = $( ".validateTips" );
                    //toClose = false;
                    //type_val = (type1.is(':checked'))? type1.val():type2.val();
                  
		function updateTips( t ) {
			tips
				.text( t )
				.addClass( "ui-state-highlight" );
			setTimeout(function() {
				tips.removeClass( "ui-state-highlight", 1500 );
			}, 500 );
		}

		function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( "ui-state-error" );
				updateTips( "La taille du " + n + " doit etre entre " +
					min + " et " + max + "." );
				return false;
			} else {
				return true;
			}
		}
                
                function checkNotNull(prenom)
                {
                    if(prenom.val()==""){
                        prenom.addClass( "ui-state-error" );
                        updateTips( "Le champ prenom ne doit pas etre vide." );
                        return false;
                    }else{
                        return true;
                    }
                        
                        
                }
                
                function matchPassword(confirm_password,password)
                {
                  
                   if(confirm_password.val() == password.val()){
                       return true;
                   }else{
                       confirm_password.addClass( "ui-state-error" );
                       updateTips( "Le champ confirmation de mot-de-passe doit correspondre au champ mot-de-pass." );
                       return false ;              
                   }
                  // return (confirm_password == password)? true:updateTips( "Le champ confirmation de mot-de-passe doit correspondre au champ mot-de-pass." );false ;
                }
                
		function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass( "ui-state-error" );
				updateTips( n );
				return false;
			} else {
				return true;
			}
		}

		$( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 580,
			width: 420,
			modal: true,
			buttons: {
				"Create an account": function() {
					var bValid = true;                                       
					allFields.removeClass( "ui-state-error" );
                                        bValid = bValid && checkNotNull( prenom);
					bValid = bValid && checkLength( name, "nom", 3, 16 );
                                        bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Le login doit contenir de a-z, 0-9, underscores, commence par une lettre." );
					// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
					bValid = bValid && checkLength( email, "email", 6, 80 );
					bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
                                        bValid = bValid && checkLength( password, "mot-de-passe", 5, 16 );
                                        bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Les charactères qui sont permises: a-z 0-9" );
                                        bValid = bValid && matchPassword(confirm_password,password );
                                        
                                        type_val =(type1.is(':checked'))?type1.val():type2.val();                                          

					if ( bValid ) {
//						$( "#example tbody" ).append( "<tr>" +
//							"<td>" + name.val() + "</td>" + 
//                                                        "<td>" + prenom.val() + "</td>" +
//							"<td>" + email.val() + "</td>" + 
//							"<td>" + type.val() + "</td>" +
//                                                        "<td><div style='width:50px;float:left;'>" + 
//						"</tr>" ); 
                                                
                                                  $.post(
                                                          'ajax_create_user',
                                                           {
                                                              first_name : prenom.val(),
                                                              last_name  : name.val(),
                                                              email      : email.val(),
                                                              password   : password.val(),
                                                              type_group : type_val                                                              
                                                           },
                                                        function(data){
                                                           var content = $(data);
                                                        
                                                           if(data=="alert")
                                                           {   
                                                               email.addClass("ui-state-error");
                                                               confirm_password.removeClass("ui-state-error");
                                                               updateTips( "Ce mail existe déja dans la base. Veuillez essayer avec un nouveau mail." );
                                                             
                                                           }else
                                                           {   
                                                             
                                                               $( "#example tbody" ).append(content);      
                                                               $( "#dialog-form" ).dialog("close");
                                                           }                                                          
                                                        }
                                                    );
                                                      
//                                                if(toClose)
//                                                {
//                                                    $( this ).dialog( "close" );
//                                                }
					}
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			},
			 open: function() {
				$(".ui-widget-overlay").css({
				  background: "#000",
				  opacity: 0.6
			 });
			 }
		});

		$( "#create-user" )
			.button()
			.click(function() {
				$( "#dialog-form" ).dialog( "open" );
			});
	});
	</script>
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
