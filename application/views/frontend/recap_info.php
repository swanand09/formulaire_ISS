<?php
  
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
<script type="text/javascript">
      $(document).ready(function(){
            // Your code here
            $('.inline-edit').inlineEdit({hover: 'hover'}); 
            var scrollto= "#bouton_envoimail";
             var $target = $(scrollto);
             $target = $target.length && $target || $('[name=' + scrollto.slice(1) +']');
             if ($target.length) {
                   var targetOffset = $target.offset().top;
                   $('html,body').animate({scrollTop: targetOffset}, 6000);
                  return false;
             }
	  
      });
  </script>
<div id="form_recap_info">
   <?php
		$attributes = array('id' => 'recap_info');
		echo form_open('frontend/process_mail_dino', $attributes);
	?>
    <div class="info">
        <h4>Recap</h4>
         <table cellpadding="2" cellspacing="2" border="0">
           <tr>
           <td>
              <table cellpadding="2" cellspacing="2" border="0">
               <tr>
                   <td style="width:200px;">PRESENCE CLIENT: </td>
                   <td>
                        <div class='inline-edit' style='border: none;'>
                               <div class='display'><?php echo $presence_client;?></div>
                               <div class='form'>
                                    <select name="presence_client" id="presence_client" class='text'>
                                        <option value="OUI" <?php if($presence_client=="OUI"){echo "selected";}?>>OUI</option>
                                     <option value="NON" <?php if($presence_client=="NON"){echo "selected";}?>>NON</option>
                                    </select>
                               </div>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:200px;"> SYNC en Début ISS:</td>
                    <td>
                         <div class='inline-edit' style='border: none;'>
                                <div class='display'><?php echo $sync_debut;?></div>
                                <div class='form'>
                                     <select name="sync_debut" id="sync_debut" class='text'>
                                         <option value="OK" <?php if($sync_debut=="OK"){echo "selected";}?>>OK</option>
                                      <option value="NOK" <?php if($sync_debut=="NOK"){echo "selected";}?>>NOK</option>
                                     </select>
                                </div>
                         </div>
                     </td>
                   </tr>
                  <tr>
                        <td>TENSION (Volt)</td>
                        <td> <div class='inline-edit' style='border: none;'>
                               <div class='display'><?php echo $tension;?></div>
                               <div class='form'>
                                    <input type="text" name="tension" value="<?php echo $tension;?>" class="text" id="tension">                                     
                               </div>
                        </div></td>
                    </tr>
                    <tr>
                        <td>DT (Défaut Type)</td>
                        <td> <div class='inline-edit' style='border: none;'>
                               <div class='display'><?php echo $dt;?></div>
                               <div class='form'>
                                     <select name="DT" id="DT" class='text'>
                                        <option value="BOUCLE" <?php if($dt=="BOUCLE"){echo "selected";}?>>BOUCLE</option>
                                        <option value="CIRCUIT OUVERT" <?php if($dt=="CIRCUIT OUVERT"){echo "selected";}?>>CIRCUIT OUVERT</option>
                                        <option value="LIGNE_QUAL" <?php if($dt=="LIGNE_QUAL"){echo "selected";}?>>LIGNE_QUAL</option>
                                      </select>
                               </div>
                        </div></td>
                    </tr>
                    <tr>
                        <td>PLC (Pré-localisation client final) (Métres)</td>
                        <td> <div class='inline-edit' style='border: none;'>
                               <div class='display'><?php echo $plc;?></div>
                               <div class='form'>
                                    <input type="text" name="plc" value="<?php echo $plc;?>" class="text" id="plc">                                     
                               </div>
                        </div></td>
                    </tr>
                     <tr>
                        <td>PLN (Pré-localisation client NRA) (Mètres)</td>
                        <td><div class='inline-edit' style='border: none;'>
                               <div class='display'><?php echo $pln;?></div>
                               <div class='form'>
                                    <input type="text" name="pln" value="<?php echo $pln;?>" class="text" id="pln">                                     
                               </div>
                        </div></td>
                    </tr>
                     <tr>
                        <td>(Résistance d'Isolement) = Brin A/Terre</td>
                        <td><div class='inline-edit' style='border: none;'>
                               <div class='display'><?php echo $brin_aterre;?></div>
                               <div class='form'>
                                    <input type="text" name="brin_aterre" value="<?php echo $brin_aterre;?>" class="text" id="brin_aterre">                                     
                               </div>
                        </div></td>
                    </tr>
                     <tr>
                        <td>(Résistance d'Isolement) = Brin A/BATT </td>
                        <td><div class='inline-edit' style='border: none;'>
                               <div class='display'><?php echo $brin_abatt;?></div>
                               <div class='form'>
                                    <input type="text" name="brin_abatt" value="<?php echo $brin_abatt;?>" class="text" id="brin_abatt">                                     
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
                               <div class='display'><?php echo $brin_bterre;?></div>
                               <div class='form'>
                                    <input type="text" name="brin_bterre" value="<?php echo $brin_bterre;?>" class="text" id="brin_bterre">                                     
                               </div>
                        </div></td>
                        </tr>
                        <tr>
                            <td>(Résistance d'Isolement) = Brin B/BATT </td>
                            <td><div class='inline-edit' style='border: none;'>
                               <div class='display'><?php echo $brin_bbatt;?></div>
                               <div class='form'>
                                    <input type="text" name="brin_bbatt" value="<?php echo $brin_bbatt;?>" class="text" id="brin_bbatt">                                     
                               </div>
                        </div></td>
                        </tr>
                        <tr>
                            <td>(Résistance d'Isolement) = Brin A/B </td>
                            <td><div class='inline-edit' style='border: none;'>
                               <div class='display'><?php echo $brin_ab;?></div>
                               <div class='form'>
                                    <input type="text" name="brin_ab" value="<?php echo $brin_ab;?>" class="text" id="brin_ab">                                     
                               </div>
                        </div></td>
                        </tr>
                        <tr>
                            <td>TSPM (Tonalité Sur Prise Murale)</td>
                            <td><div class='inline-edit' style='border: none;'>
                               <div class='display'><?php echo $tspm;?></div>
                               <div class='form'>
                                    <select name="tspm" id="tspm" class='text'>
                                      <option value="ABSENCE" <?php if($tspm=="ABSENCE"){echo "selected";}?>>ABSENCE</option>
                                       <option value="CONTINUE" <?php if($tspm=="CONTINUE"){echo "selected";}?>>CONTINUE</option>
                                       <option value="OCCUPEE" <?php if($tspm=="OCCUPEE"){echo "selected";}?>>OCCUPEE</option>
                                     </select>
                               </div>
                        </div></td>
                        </tr>
                        <tr>
                            <td>TEST DE PORT AU RNA</td>
                            <td><div class='inline-edit' style='border: none;'>
                               <div class='display'><?php echo $test_port_rna;?></div>
                               <div class='form'>
                                    <select name="test_port_rna" id="tspm" class='text'>
                                      <option value="SYNCHRO NOK" <?php if($test_port_rna=="SYNCHRO NOK"){echo "selected";}?>>SYNCHRO NOK</option>
                                       <option value="SYNCHRO OK" <?php if($test_port_rna=="SYNCHRO OK"){echo "selected";}?>>SYNCHRO OK</option>
                                       <option value="NON EFFECTUE" <?php if($test_port_rna=="NON EFFECTUE"){echo "selected";}?>>NON EFFECTUE</option>
                                     </select>
                               </div>
                        </div></td>
                        </tr>
                         <tr>
                            <td>Informations Complémentaires(CGT PRISE, CGT BOX, autres...)</td>
                            <td><div class='inline-edit' style='border: none;'>
                               <div class='display'><?php echo $ifc;?></div>
                               <div class='form'>
                                    <input type="text" name="ifc" class="text" value="<?php echo $ifc;?>" id="ifc">                                     
                               </div>
                        </div></td>
                        </tr>
                         <tr>
                            <td>PRECONISATION DU TECHNICIEN SUITE ISS</td>
                            <td><div class='inline-edit' style='border: none;'>
                               <div class='display'><?php echo $prec_tech;?></div>
                               <div class='form'>
                                    <input type="text" name="prec_tech" class="text" id="prec_tech" value="<?php echo $prec_tech;?>">                                     
                               </div>
                        </div></td>
                        </tr>
                         <tr>
                            <td> SYNC en départ ISS </td>
                            <td> <div class='inline-edit' style='border: none;'>
                               <div class='display'><?php echo $sync_depart;?></div>
                               <div class='form'>
                                    <select name="sync_depart" id="sync_debut" class='text'>
                                     <option value="OK" <?php if($sync_depart=="OK"){echo "selected";}?>>OK</option>
                                     <option value="NOK" <?php if($sync_depart=="NOK"){echo "selected";}?>>NOK</option>
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
             <input type="submit" id="bouton_envoimail" value="Validation de l'intervention">
           </p>
    </form>    
</div>  
  