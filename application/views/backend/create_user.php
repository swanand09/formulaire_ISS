<?php 
    if($message!="")
    {
        echo "<div>
                <div class='error'>";
                    echo $message;
        echo    "</div>
             </div>";         
    }  
?>  
<style>
    .nav111
    {
        list-style: none;
        margin-left: 0;
        padding-left: 1em;
        text-indent: -1em;float:right;
    }   
    .nav222
    {
        display:inline;
        padding:5px;
    }
</style>
<ul class="nav111">
        <li class="nav222"><?php echo anchor('backend/users_list', 'Liste utilisateur', 'title="Liste utilisateur"');?></li>
        <li class="nav222"><?php echo anchor('frontend/logout', 'deloguer', 'title="deloguer"');?></li>
        <li class="nav222"><?php echo anchor('frontend/verif_ticket', 'Frontend', 'title="Frontend"');?></li>
    </ul>
   
    <div style="clear:both;">
<?php echo form_open("backend/process_create_user");?>
        <fieldset>
          <legend>Création utilisateur</legend> 
          <div style="float:left;">
          <p>
            <label for="dummy_email">Prenom:</label><br>
             <?php echo form_input($first_name);?>
          </p>			
          <p>
            <label for="dummy3">Nom:</label><br>
            <?php echo form_input($last_name);?>
          </p>
         
        
          </div>
          <div style="float:left;margin-left:50px;">
          <p>
            <label for="dummy3">Email:</label><br>
            <?php echo form_input($email);?>
          </p>
          <p>
            <label for="dummy3">Mot de passe:</label><br>
             <?php echo form_input($password);?>
          </p>
             
          </div>
          <div style="float:left;margin-left:50px;">
             <p>
                <label for="dummy3">Confirmation Mot-de-passe:</label><br>
                 <?php echo form_input($password_confirm);?>
            </p> 
            <p>
                 <label for="dummy3">Type:</label><br>
                 <?php 
                        echo "admin ".form_radio($type_group1)."&nbsp;"."members ".form_radio($type_group2);
                 ?>
                 
            </p>
          </div>
          <div style="clear:both;">
          <p>
              <?php echo form_submit('submit', 'Créer Utilisateur');?>              
          </p>
          </div>
        </fieldset>
  <?php echo form_close();?>
    </div>