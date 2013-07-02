<?php
    echo anchor('frontend/logout', 'deloguer', 'title="deloguer"');
    echo js("jquery-1.8.3.js");
    echo js("jquery.inline-edit.js");
?>
<style>
    input[type="text"]{
       width:100px;
    }
   .inline-edit {
      font-weight:bold;	
   }
   .inline-edit .form {
           display: none;
   }

   .inline-edit .hover {
        background-color: #FFFFA5;
        cursor: pointer;
   }
</style>
<script type="text/javascript">
      $(document).ready(function(){
         $("#form_saisie_info").hide();
         $("#form_recap_info").hide();
         $("#nom_tech").hide();    
      });
  </script>
<div>
    <div class="info">
       <table cellpadding="2" cellspacing="2" border="0">
            <tr>
                <td style="width:150px;">Numéro ticket:</td>
                <td><strong><?php echo $num_ticket; ?></strong></td>
            </tr>
            <tr>
                <td style="width:150px;">Sujet:</td>
                <td><strong><?php echo $sujet; ?></strong></td>
            </tr>
            <tr>
                <td style="width:150px;">Tel. du client:</td>
                <td><strong><?php echo $tel; ?></strong></td>
            </tr>
             <tr id="nom_tech">
                <td style="width:150px;">Technicien effectuant l'intervention:</td>
                <td><strong><?php echo $nom_technicien;?></strong></td>
             </tr>
       </table>	
    </div>
</div> 		
     <!-- <div class="span-12">-->
<div>	
    <p>
      <input type="submit" id="button_saisir" value="Saisir les données techniques">    
      <input type="submit" id="button_retour" value="Retour">           
    </p>  
 </div>
 <script type="text/javascript">
      $(document).ready(function(){
            // Your code here
            $("#button_saisir").click(
                function () {
                  
                    $("#form_saisie_info").show(1000);
                    $("#button_saisir").hide();
                    $("#button_retour").hide();
                    $("#nom_tech").show(1000);
                    var scrollto= "#button_recap";
                    var $target = $(scrollto);
                    $target = $target.length && $target 
                    || $('[name=' + scrollto.slice(1) +']');
                    if ($target.length) {
                               var targetOffset = $target.offset().top;
                               $('html,body')
                               .animate({scrollTop: targetOffset}, 6000);
                              return false;
                       }
                  return false;
                }
            );
       });
  </script>
<div id="form_saisie_info">
    <form id="saisie_info" action="frontend/process_validate_ticket" method="post">
   <?php //echo form_open("frontend/process_recap_info");?>
       <fieldset>
         <legend>Entrez les infos techniques de l'ISS</legend>    
                 <div style="float:left;">
                  <p>
                 <label> SYNC en Début ISS </label><br>
<!--                 <input type="radio" name="sync_debut" class="sync_debut"  value="1"> OK<br>
                 <input type="radio" name="sync_debut" class="sync_debut" value="0"> NOK<br> -->
                 <select name="sync_debut" id="sync_debut">
                      <option value="OK">OK</option>
                      <option value="NOK">NOK</option>
                 </select>        
                 </p>
                 <p>
                   <label for="dummy1">TENSION (Volt)</label><br>
                   <input type="text" value="" name="tension" id="tension" class="text">
                 </p>  
                 <p>
                     <label for="dummy3">DT (Défaut Type)</label><br>
                     <select name="dt" id="dt">
                       <option value="BOUCLE">BOUCLE</option>
                       <option value="CIRCUIT OUVERT">CIRCUIT OUVERT</option>
                       <option value="LIGNE_QUAL">LIGNE_QUAL</option>
                     </select>
                 </p>  
                 <p>
                   <label for="dummy1">PLC (Pré-localisation client final) (Métres)</label><br>
                   <input type="text" value="" name="plc" id="plc" class="text">
                 </p>  
                 <p>
                   <label for="dummy1">PLN (Pré-localisation client NRA) (Mètres) </label><br>
                   <input type="text" value="" name="pln" id="pln" class="text">
                 </p>     
                 <p>
                   <label for="dummy1">(Résistance d'Isolement) = Brin A/Terre </label><br>
                   <input type="text" value="" name="brin_aterre" id="brin_aterre" class="text">
                 </p>         
                 <p>
                   <label for="dummy1">(Résistance d'Isolement) = Brin A/BATT </label><br>
                   <input type="text" value="" name="brin_abatt" id="brin_abatt" class="text">
                 </p>   
             </div>  
             <div style="float:left;margin-left:50px;">
                  <p>
                   <label for="dummy1">(Résistance d'Isolement) = Brin B/Terre  </label><br>
                   <input type="text" value="" name="brin_bterre" id="brin_bterre" class="text">
                 </p>    
                 <p>
                   <label for="dummy1">(Résistance d'Isolement) = Brin B/BATT  </label><br>
                   <input type="text" value="" name="brin_bbatt" id="brin_bbatt" class="text">
                 </p>  
                 <p>
                   <label for="dummy1">(Résistance d'Isolement) = Brin A/B  </label><br>
                   <input type="text" value="" name="brin_ab" id="brin_ab" class="text">
                 </p>  
                 <p>
                     <label for="dummy3">TSPM (Tonalité Sur Prise Murale)</label><br>
                     <select name="tspm" id="tspm">
                       <option value="ABSENCE">ABSENCE</option>
                       <option value="CONTINUE">CONTINUE</option>
                       <option value="OCCUPEE">OCCUPEE</option>
                     </select>
                 </p>
                 <p>
                   <label for="dummy1">IFC (Informations Complémentaires) </label><br>
                   <input type="text" value="" name="ifc" id="ifc" class="text">
                 </p>   
                  <p>
                   <label for="dummy1">PRECONISATION DU TECHNICIEN SUITE ISS </label><br>
                   <input type="text" value="" name="prec_tech" id="prec_tech" class="text">
                 </p>  

                 <p>
                     <label>  SYNC en départ ISS  </label><br>
                     <select name="sync_depart" id="sync_depart">
                      <option value="OK">OK</option>
                      <option value="NOK">NOK</option>
                 </select> 
<!--                     <input type="radio" name="sync_depart" value="1"> OK<br>
                     <input type="radio" name="sync_depart" value="0"> NOK<br>                        -->
                 </p> 
             </div>                   

            <div style="clear:both;">
             <p>
               <input type="submit" id="button_recap" value="Recapituler les donnés saisie">             
             </p>
            </div>    
       </fieldset>
  <?php echo form_close();?>
</div>
<script type="text/javascript">
	 $(document).ready(function(){
	 		  $('.inline-edit').inlineEdit({hover: 'hover'}); 
            // Your code here
            $("#button_recap").click(
                function () {
                    $("#form_saisie_info").hide(); 	
                    $("#form_recap_info").show(1000);
                    $('#div_sync_debut').html($("#sync_debut").val());
                    $('#div_tension').html($("#tension").val());
                    $('#div_dt').html($("#dt").val());
                    $('#div_plc').html($("#plc").val());
                    $('#div_pln').html($("#pln").val());
                    $('#div_brin_aterre').html($("#brin_aterre").val());
                    $('#div_brin_abatt').html($("#brin_abatt").val());
                    $('#div_brin_bterre').html($("#brin_bterre").val());
                    $('#div_brin_bbatt').html($("#brin_bbatt").val());
                    $('#div_brin_ab').html($("#brin_ab").val());
                    $('#div_tspm').html($("#tspm").val());
                    $('#div_ifc').html($("#ifc").val());
                    $('#div_prec_tech').html($("#prec_tech").val());
                    $('#div_sync_depart').html($("#sync_depart").val());
                    var scrollto= "#bouton_envoimail";
                    var $target = $(scrollto);
                    $target = $target.length && $target 
                    || $('[name=' + scrollto.slice(1) +']');
                    if ($target.length) {
                        var targetOffset = $target.offset().top;
                        $('html,body')
                        .animate({scrollTop: targetOffset}, 6000);
                       return false;
                     }
                      return false;
                }
            );
       });
</script>
<div id="form_recap_info">
	<?php
		$attributes = array('id' => 'recap_info');
		echo form_open('frontend/process_mail_dino', $attributes);
	?>
   <!-- <form id="recap_info" action="" method="post">-->
    <div class="info">
        <h4>Recap</h4>
         <table cellpadding="2" cellspacing="2" border="0">
           <tr>
           <td>
              <table cellpadding="2" cellspacing="2" border="0">
               <tr>
                   <td style="width:200px;"> SYNC en Début ISS:</td>
                   <td>
                        <div class='inline-edit' style='border: none;'>
                               <div class='display' id="div_sync_debut"></div>
                               <div class='form'>
                                    <select name="sync_debut" id="sync_debut" class='text'>
                                     <option value="OK">OK</option>
                                     <option value="NOK">NOK</option>
                                    </select>
                               </div>
                        </div>
                    </td>
                  </tr>
                  <tr>
                        <td>TENSION (Volt)</td>
                        <td> <div class='inline-edit' style='border: none;'>
                               <div class='display' id="div_tension"></div>
                               <div class='form'>
                                    <input type="text" name="tension" class="text" id="tension">                                     
                               </div>
                        </div></td>
                    </tr>
                    <tr>
                        <td>DT (Défaut Type)</td>
                        <td> <div class='inline-edit' style='border: none;'>
                               <div class='display' id="div_dt"></div>
                               <div class='form'>
                                     <select name="DT" id="DT" class='text'>
                                        <option value="BOUCLE">BOUCLE</option>
                                        <option value="CIRCUIT OUVERT">CIRCUIT OUVERT</option>
                                        <option value="LIGNE_QUAL">LIGNE_QUAL</option>
                                      </select>
                               </div>
                        </div></td>
                    </tr>
                    <tr>
                        <td>PLC (Pré-localisation client final) (Métres)</td>
                        <td> <div class='inline-edit' style='border: none;'>
                               <div class='display' id="div_plc"></div>
                               <div class='form'>
                                    <input type="text" name="plc" class="text" id="plc">                                     
                               </div>
                        </div></td>
                    </tr>
                     <tr>
                        <td>PLN (Pré-localisation client NRA) (Mètres)</td>
                        <td><div class='inline-edit' style='border: none;'>
                               <div class='display' id="div_pln"></div>
                               <div class='form'>
                                    <input type="text" name="pln" class="text" id="pln">                                     
                               </div>
                        </div></td>
                    </tr>
                     <tr>
                        <td>(Résistance d'Isolement) = Brin A/Terre</td>
                        <td><div class='inline-edit' style='border: none;'>
                               <div class='display' id="div_brin_aterre"></div>
                               <div class='form'>
                                    <input type="text" name="brin_aterre" class="text" id="brin_aterre">                                     
                               </div>
                        </div></td>
                    </tr>
                     <tr>
                        <td>(Résistance d'Isolement) = Brin A/BATT </td>
                        <td><div class='inline-edit' style='border: none;'>
                               <div class='display' id='div_brin_abatt'></div>
                               <div class='form'>
                                    <input type="text" name="brin_abatt" class="text" id="brin_abatt">                                     
                               </div>
                        </div></td>
                    </tr>
                </table>	
                </td>
                <td>
                    <table cellpadding="2" cellspacing="2" border="0">
                        <tr>
                            <td style="width:200px;"> (Résistance d'Isolement) = Brin B/Terre:</td>
                            <td><div class='inline-edit' style='border: none;'>
                               <div class='display' id='div_brin_bterre'></div>
                               <div class='form'>
                                    <input type="text" name="brin_bterre" class="text" id="brin_bterre">                                     
                               </div>
                        </div></td>
                        </tr>
                        <tr>
                            <td>(Résistance d'Isolement) = Brin B/BATT </td>
                            <td><div class='inline-edit' style='border: none;'>
                               <div class='display' id='div_brin_bbatt'></div>
                               <div class='form'>
                                    <input type="text" name="brin_bbatt" class="text" id="brin_bbatt">                                     
                               </div>
                        </div></td>
                        </tr>
                        <tr>
                            <td>(Résistance d'Isolement) = Brin A/B </td>
                            <td><div class='inline-edit' style='border: none;'>
                               <div class='display' id='div_brin_ab'></div>
                               <div class='form'>
                                    <input type="text" name="brin_ab" class="text" id="brin_ab">                                     
                               </div>
                        </div></td>
                        </tr>
                        <tr>
                            <td>TSPM (Tonalité Sur Prise Murale)</td>
                            <td><div class='inline-edit' style='border: none;'>
                               <div class='display' id='div_tspm'></div>
                               <div class='form'>
                                     <select name="tspm" id="tspm" class='text'>
                                       <option value="ABSENCE">ABSENCE</option>
                                        <option value="CONTINUE">CONTINUE</option>
                                        <option value="OCCUPEE">OCCUPEE</option>
                                      </select>
                               </div>
                        </div></td>
                        </tr>
                         <tr>
                            <td>IFC (Informations Complémentaires))</td>
                            <td><div class='inline-edit' style='border: none;'>
                               <div class='display' id='div_ifc'></div>
                               <div class='form'>
                                    <input type="text" name="ifc" class="text" id="ifc">                                     
                               </div>
                        </div></td>
                        </tr>
                         <tr>
                            <td>PRECONISATION DU TECHNICIEN SUITE ISS</td>
                            <td><div class='inline-edit' style='border: none;'>
                               <div class='display' id='div_prec_tech'></div>
                               <div class='form'>
                                    <input type="text" name="prec_tech" class="text" id="prec_tech">                                     
                               </div>
                        </div></td>
                        </tr>
                         <tr>
                            <td> SYNC en départ ISS </td>
                            <td> <div class='inline-edit' style='border: none;'>
                               <div class='display' id='div_sync_depart'></div>
                               <div class='form'>
                                    <select name="sync_depart" id="sync_debut" class='text'>
                                     <option value="OK">OK</option>
                                     <option value="NOK">NOK</option>
                                    </select>
                               </div>
                        </div></td>
                        </tr>
                   </table>	
                </td>
            </tr>
          </table>
           </div>         			
           <p>
             <input type="submit" id="bouton_envoimail" value="Envoie mail">
           </p>
    </form>    
</div>  
