<?php
    echo js("jquery-1.8.3.js");
    echo js("jquery.inline-edit.js");
    echo js("jquery.validate.js");
?>
<style>
    input[type="text"]{
       width:100px;
       margin-right:10px;
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
/*   label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }*/
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
   <form id="dummy" action="" method="post">			
       <p>
         <input type="submit" id="button_saisir" value="Saisir les données techniques">    
         <input type="submit" id="button_retour" value="Retour">           
       </p>          
   </form>
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
//                    var scrollto= "#button_recap";
                    var scrollto= "#to_scroll";
                    var $target = $(scrollto);
                    $target = $target.length && $target 
                    || $('[name=' + scrollto.slice(1) +']');
                    if ($target.length) {
                               var targetOffset = $target.offset().top;
                               $('html,body')
                               .animate({scrollTop: targetOffset}, 3000);
                              return false;
                       }
                  return false;
                }
            );
                
             $("#frmSaisInfo").validate();
       });
  </script>
<div id="form_saisie_info">
<!--    <form id="saisie_info" action="frontend/process_validate_ticket" method="post">-->
   <?php echo form_open("frontend/process_recap_info",array("id"=>"frmSaisInfo"));?>
       <fieldset>
         <legend id="to_scroll">Entrez les infos techniques de l'ISS</legend>    
                 <div style="float:left;">
                  <p>
                     <label> PRESENCE CLIENT </label><br>                    
                    <select name="presence_client" id="presence_client">
                         <option value="OUI">OUI</option>
                         <option value="NON">NON</option>
                    </select>   
                  </p>
                  <p>
                    <label> SYNC en Début ISS </label><br>                    
                    <select name="sync_debut" id="sync_debut">
                         <option value="OK">OK</option>
                         <option value="NOK">NOK</option>
                    </select>        
                 </p>
                 <p>
                   <label for="dummy1">TENSION (Volt)</label><br>
                   <input type="text" value="" name="tension" class="required" id="tension" class="text">
                 </p>  
                 <p>
                     <label for="dummy3">DT (Défaut Type)</label><br>
                     <select name="DT" id="DT">
                       <option value="BOUCLE">BOUCLE</option>
                       <option value="CIRCUIT OUVERT">CIRCUIT OUVERT</option>
                       <option value="LIGNE_QUAL">LIGNE_QUAL</option>
                     </select>
                 </p>  
                 <p>
                   <label for="dummy1">PLC (Pré-localisation client final) (Métres)</label><br>
                   <input type="text" value="" name="plc" id="plc" class="required" class="text">
                 </p>  
                 <p>
                   <label for="dummy1">PLN (Pré-localisation client NRA) (Mètres) </label><br>
                   <input type="text" value="" name="pln" id="pln" class="required" class="text">
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
                     <label for="dummy3">TEST DE PORT AU RNA </label><br>
                     <select name="test_port_rna" id="test_port_rna">
                       <option value="SYNCHRO NOK">SYNCHRO NOK</option>
                       <option value="SYNCHRO OK">SYNCHRO OK</option>
                       <option value="NON EFFECTUE">NON EFFECTUE</option>
                     </select>
                 </p>
                 <p>
                   <label for="dummy1">Informations Complémentaires(CGT PRISE, CGT BOX, autres...) </label><br>
                   <input type="text" value="" name="ifc" id="ifc" class="required" class="text">
                 </p>   
                  <p>
                   <label for="dummy1">PRECONISATION DU TECHNICIEN SUITE ISS </label><br>
                   <input type="text" value="" name="prec_tech" class="required" id="prec_tech" class="text">
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

