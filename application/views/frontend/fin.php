 <div>    
            <div class="success">
              <p>Vos donnés ont été bien enregistrés dans la base de DINO.</p>
              <p>
                  <?php 
                       echo anchor('frontend/verif_ticket', 'Saisir une nouvelle ISS', 'title="Saisir une nouvelle ISS"')."&nbsp;&nbsp";
                       echo anchor('frontend/logout', 'deloguer', 'title="deloguer"');
                  ?>
              </p>
            </div>
        </div>
