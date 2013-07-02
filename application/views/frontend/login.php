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
  <?php echo form_open("frontend/process_login");?>
          <fieldset>
            <legend>Login</legend>            		
            <p>
              <label for="dummy_email">Email</label><br>
<!--              <input type="email" class="text" id="dummy_email" name="dummy_email" value="email-with-class-text@example.com">-->
              	<?php echo form_input(array("name"=>"login_email","class"=>"text","value"=>$email));?>
            </p>			
            <p>
              <label for="dummy3">Mot de passe</label><br>
<!--              <input type="password" class="text" id="dummy3" name="dummy3" value="Password">-->
                 <?php echo form_password(array("name"=>"login_pwd","class"=>"text","value"=>$password));?>
                </p>
            <p>
                <?php echo form_submit('submit', 'Login');?>              
            </p>
          </fieldset>
    <?php echo form_close();?>