<?php 
    if($message!="")
    {
        echo "<div>
                <div class='info'>";
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
<script type="text/javascript">
    function delete_user(id)
    {
        if(confirm('Êtes-vous sur vouloir supprimer cet utilisateur?'))
        {
            window.location='delete_user/'+id;
        }
        return false;
    }
    function deactivate_user(id)
    {
        if(confirm('Êtes-vous sur vouloir déactiver cet utilisateur?'))
        {
             window.location='deactivate_user/'+id;
        }
        return false;
    }
</script>
<div>   
    <ul class="nav111">
            <li class="nav222"><button id="create-user">Create new user</button><?php //echo anchor('backend/create_user', 'Créer nouveau utilisateur', 'title="Créer nouveau utilisateur"');?></li>
            <li class="nav222"><?php echo anchor('frontend/logout', 'deloguer', 'title="deloguer"');?></li>
            <li class="nav222"><?php echo anchor('frontend/verif_ticket', 'Frontend', 'title="Frontend"');?></li>
    </ul>
   
    <div style="clear:both;">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
        <thead>
                <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Mail</th>
                    <th>Groupe</th>
                    <th>Etat</th>
                 
                </tr>	
        </thead>
        <tbody>
            <?php foreach ($users as $user):?>
                    <tr>
                        <td><?php echo $user['first_name']?></td>
                        <td><?php echo $user['last_name']?></td>
                        <td><?php echo $user['email'];?></td>
                        <td><?php echo $user['group_description'];?></td>
                        <td><?php 
                                   echo "<div style='width:50px;float:left;'>";
                                   //echo ($user['active']) ? anchor("auth/deactivate/".$user['id'], 'Active') : anchor("auth/activate/". $user['id'], 'Inactive');
                                   echo ($user['active']) ? "<span style='cursor:pointer;text-decoration:underline;' onclick='javascript:deactivate_user(".$user['id'].");' >Active</span>" : anchor("auth/activate/". $user['id'], 'Inactive');
                                   echo "</div>"; 
                                   echo "<div style='width:50px;float:left;'>".image('icoSupprimer.png',NULL,array('style'=>'cursor:pointer;','onclick'=>'javascript:delete_user('.$user['id'].');','alt'=>'Supprimer','title'=>'Supprimer','width'=>'12'))."</div>";    
                              ?>
                        </td>
                      </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>
</div>    

<script type="text/javascript">
        $(document).ready( function() {
            $('#example').dataTable( {
                    "oLanguage": {
                            "sProcessing":     "Traitement en cours...",
                            "sSearch":         "Rechercher&nbsp;:",
                            "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                            "sInfo":           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                            "sInfoEmpty":      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                            "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                            "sInfoPostFix":    "",
                            "sLoadingRecords": "Chargement en cours...",
                            "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                            "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                            "oPaginate": {
                               "sFirst":      "Premier",
                                            "sPrevious":   "Pr&eacute;c&eacute;dent",
                                            "sNext":       "Suivant",
                                            "sLast":       "Dernier"
                              },
                            "oAria": {
                            "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                            "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                            }	  
                },

                    "bDestroy": true	
            } );
        } );
 </script>
 
 <div id="dialog-form" title="Create new user">
	<p class="validateTips">All form fields are required.</p>

	<form>
	<fieldset>
		<label for="name">Prenom</label>
		<input type="text" name="prenom" id="prenom" class="text ui-widget-content ui-corner-all" />
                <label for="name">Nom</label>
		<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
		<label for="email">Email</label>
		<input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all" />
		<label for="password">Mot-de-passe</label>
		<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
                <label for="confirm_password">Confirmation Mot-de-passe</label>
		<input type="password" name="confirm_password" id="confirm_password" value="" class="text ui-widget-content ui-corner-all" />
                <label for="type">Type</label>
		 admin<input id="type_group1" type="radio" value="admin" name="type_group">&nbsp;members<input id="type_group2" type="radio" checked="checked" value="members" name="type_group">
	</fieldset>
	</form>
</div>