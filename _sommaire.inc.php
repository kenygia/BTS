

<?php
/** 
 * Contient la division pour le sommaire, sujet à des variations suivant la 
 * connexion ou non d'un utilisateur, et dans l'avenir, suivant le type de cet utilisateur 
 * @todo  RAS
 */

?>
    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    <?php      
      if (estVisiteurConnecte() ) {
          $idUser = obtenirIdUserConnecte() ;
          $lgUser = obtenirDetailVisiteur($idConnexion, $idUser);
          $nom = $lgUser['nom'];
          $prenom = $lgUser['prenom']; 
  	  $type = $lgUser['type'];           
    ?>
        <h2>
    <?php  
            echo $nom . " " . $prenom ;
    ?>
    <?php
	switch ($type)
	{
	case  "Visiteur" :
			echo "Visiteur médical";
			break;
	case  "comptable" :
			echo "Comptable";
			break;
	}
       }
    ?>  
      </div>  
<?php      
  if (estVisiteurConnecte() ) {
?>


		
        <ul id="menuList">
           <li class="smenu">
              <a href="cAccueil.php" title="Page d'accueil">Accueil</a>
           </li>
          
           <li class="smenu">
           <?php
		   if($type == "Visiteur")
		   {
		   echo "<a href='cSaisieFicheFrais.php' title='Saisie Fiche de frais du mois courant'>Saisie fiche de frais</a>";
		   }
		   else 
		   //on affiche la validation fiche de frais pour le comptable
		   {
			   echo "<a href='cValiderFichesFrais.php' title='Valider fiche de frais du mois courant'>Validation fiche de frais</a>";
		   }
		   ?>
            <?php
		   if($type == "Visiteur")
		   {
		   echo "<a href='cConsultFichesFrais.php' title='Consultation de mes fiches de frais'>Mes fiches de frais</a>";
		   }
		   else 
		   //on affiche le suivi paiement fiche de frais pour le comptable
		   {
			   echo "<a href='cConsultFichesFrais.php' title='Consultation de mes fiches de frais'>Suivi Paiement Fiche Frais</a>";
		   }
		   ?>
              
         
            <li class="smenu">
              <a href="cSeDeconnecter.php" title="Se déconnecter">Se déconnecter</a>
           </li>
         </ul>
		 
		 
		
        <?php
          // affichage des éventuelles erreurs déjà détectées
          if ( nbErreurs($tabErreurs) > 0 ) {
              echo toStringErreurs($tabErreurs) ;
          }
  }
        ?>
    </div>
    
