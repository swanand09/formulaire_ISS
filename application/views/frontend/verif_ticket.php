<?php 
   
   
    if($message!="")
    {
        echo "<div>
                <div class='error'>";
                    echo $message;
        echo    "</div>
             </div>";
         
    }  

    echo form_open("frontend/process_validate_ticket");
?>
<!--<form id="dummy" action="" method="post">-->
    <fieldset>
      <legend>Entrez le numéro de ticket</legend>            		
      <p>
        <label for="dummy_email">Numéro ticket</label><br>
        <?php echo form_input(array("name"=>"ticket_num","class"=>"text"));?>
      </p>			
      <p>
        <input type="submit" value="Valider le ticket">             
      </p>
    </fieldset>
<!--</form>-->
<?php echo form_close();?>