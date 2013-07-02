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
       </table>	
    </div>
</div>
<div>
    <form id="dummy" action="" method="post">
       <fieldset>
         <legend>Entrez les infos techniques de l'ISS</legend>    
                 <div style="float:left;">
                  <p>
                 <label> SYNC en Début ISS </label><br>
                 <input type="radio" name="sync_debut" value="1"> OK<br>
                 <input type="radio" name="sync_debut" value="0"> NOK<br>                        
                 </p>
                 <p>
                   <label for="dummy1">TENSION (Volt)</label><br>
                   <input type="text" value="caractere numérique" name="dummy1" id="dummy1" class="text">
                 </p>  
                 <p>
                     <label for="dummy3">DT (Défaut Type)</label><br>
                     <select name="dummy3" id="dummy3">
                       <option value="1">BOUCLE</option>
                       <option value="2">CIRCUIT OUVERT</option>
                       <option value="3">LIGNE_QUAL</option>
                     </select>
                 </p>  
                 <p>
                   <label for="dummy1">PLC (Pré-localisation client final) (Métres)</label><br>
                   <input type="text" value="caractere numérique" name="dummy1" id="dummy1" class="text">
                 </p>  
                 <p>
                   <label for="dummy1">PLN (Pré-localisation client NRA) (Mètres) </label><br>
                   <input type="text" value="caractere numérique" name="dummy1" id="dummy1" class="text">
                 </p>     
                 <p>
                   <label for="dummy1">(Résistance d'Isolement) = Brin A/Terre </label><br>
                   <input type="text" value="caractere numérique" name="dummy1" id="dummy1" class="text">
                 </p>         
                 <p>
                   <label for="dummy1">(Résistance d'Isolement) = Brin A/BATT </label><br>
                   <input type="text" value="caractere numérique" name="dummy1" id="dummy1" class="text">
                 </p>   
             </div>  
             <div style="float:left;margin-left:50px;">
                  <p>
                   <label for="dummy1">(Résistance d'Isolement) = Brin B/Terre  </label><br>
                   <input type="text" value="caractere numérique" name="dummy1" id="dummy1" class="text">
                 </p>    
                 <p>
                   <label for="dummy1">(Résistance d'Isolement) = Brin B/BATT  </label><br>
                   <input type="text" value="caractere numérique" name="dummy1" id="dummy1" class="text">
                 </p>  
                 <p>
                   <label for="dummy1">(Résistance d'Isolement) = Brin A/B  </label><br>
                   <input type="text" value="caractere numérique" name="dummy1" id="dummy1" class="text">
                 </p>  
                 <p>
                     <label for="dummy3">TSPM (Tonalité Sur Prise Murale)</label><br>
                     <select name="dummy3" id="dummy3">
                       <option value="1">ABSENCE</option>
                       <option value="2">CONTINUE</option>
                       <option value="3">OCCUPEE</option>
                     </select>
                 </p>
                 <p>
                   <label for="dummy1">IFC (Informations Complémentaires) </label><br>
                   <input type="text" value="Champs libre" name="dummy1" id="dummy1" class="text">
                 </p>   
                  <p>
                   <label for="dummy1">PRECONISATION DU TECHNICIEN SUITE ISS </label><br>
                   <input type="text" value="Champs libre" name="dummy1" id="dummy1" class="text">
                 </p>  

                 <p>
                     <label>  SYNC en départ ISS  </label><br>
                     <input type="radio" name="sync_debut" value="1"> OK<br>
                     <input type="radio" name="sync_debut" value="0"> NOK<br>                        
                 </p> 
             </div>                   

            <div style="clear:both;">
             <p>
               <input type="submit" value="Recapituler les donnés saisie">             
             </p>
            </div>    
       </fieldset>
    </form>
</div>