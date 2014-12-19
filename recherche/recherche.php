
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=chesscoach', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>



<?php 
	
	include ("recherche_formulaire.php");
	

	$subject = "partie/";
	$pgnviewer = "pgnviewer/ltpgnviewer.html?";
	$nom = '';
	$prenom= '';
	$tournoi= '';
	$lieu= '';
	
	if(empty($_POST["n_partie"]) || (isset($_POST["Rechercher"])))
{ 
	
	
	if(!empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['nom_tournoi']) || !empty($_POST['noir']) || !empty($_POST['blanc']) || !empty($_POST['lieu']) || !empty($_POST['gagnee']) || !empty($_POST['perdue']) || !empty($_POST['nulle'])){
	if (!empty($_POST['nom'])){
		$nom = $_POST['nom'] ;}
		
	if (!empty($_POST['prenom'])){
		$prenom = $_POST['prenom'];}
		
		if(!empty($_POST['nom_tournoi'])){
		$tournoi = $_POST['nom_tournoi'];}
		
		if (!empty($_POST['lieu'])){
		$lieu = $_POST['lieu'] ;}
		
	if(!empty($_POST['blanc'])){
		$blanc = 1;}
		else{
		$blanc = 0;
		}
		
	if(!empty($_POST['noir'])){
		$noir = 1;}
		else{
		$noir = 0;
		}
		
	if(!empty($_POST['gagnee'])){
		$gagnee = 1;}
		else{
		$gagnee = 0;
		}

	if(!empty($_POST['perdue'])){
		$perdue = 1;}
		else{
		$perdue = 0;
		}
		
	if(!empty($_POST['nulle'])){
		$nulle = 1;}
		else{
		$nulle = 0;
		}
		
	echo"</br>";
	echo"</br>";
	
	
	if($gagnee==$perdue && $gagnee==$nulle){
	include("recherchetout.php");
	}
	
	if($gagnee==1 && $perdue==0 && $nulle==0){
	include("recherchegagnee.php");
	}
	
	if($gagnee==0 && $perdue==1 && $nulle==0){
	include("rechercheperdue.php");
	}
	
	if($gagnee==0 && $perdue==0 && $nulle==1){
	include("recherchenulle.php");
	}
	
	if($gagnee==1 && $perdue==1 && $nulle==0){
	include("recherchegagnee.php");
	include("rechercheperdue.php");
	}
	
	if($gagnee==1 && $perdue==0 && $nulle==1){
	include("recherchegagnee.php");
	include("recherchenulle.php");
	}
	
	if($gagnee==0 && $perdue==1 && $nulle==1){
	include("rechercheperdue.php");
	include("recherchenulle.php");
	}
	
	
	}}
	
	else // après avoir cliqué sur une partie
{
	
	$n_partie = $_POST["n_partie"];
			

	



	$resultats5=$bdd->query('SELECT * FROM joueur jou join partie par on jou.n_joueur=par.j_noir where n_partie='.$n_partie.'');
	$resultats5->setFetchMode(PDO::FETCH_OBJ);
	while( $resultat5 = $resultats5->fetch())
	{
		$black_nom =  $resultat5->jou_nom;
		$black_prenom =  $resultat5->jou_prenom;
	}

	$resultats6=$bdd->query('SELECT * FROM joueur jou join partie par on jou.n_joueur=par.j_blanc where n_partie='.$n_partie.'');
	$resultats6->setFetchMode(PDO::FETCH_OBJ);
	while( $resultat6 = $resultats6->fetch())
	{
		$white_nom =  $resultat6->jou_nom;
		$white_prenom =  $resultat6->jou_prenom;
	}

	if(isset($_POST["blanc"]))
		$resultats0=$bdd->query('SELECT * FROM joueur jou join partie par on jou.n_joueur=par.j_blanc join tournoi tou on par.tournoi=tou.n_tournoi where n_partie='.$n_partie.''); // si on coche blanc
	else
		if(isset($_POST["noir"]))
			$resultats0=$bdd->query('SELECT * FROM joueur jou join partie par on jou.n_joueur=par.j_noir join tournoi tou on par.tournoi=tou.n_tournoi where n_partie='.$n_partie.''); // si on coche noir
		else
			$resultats0=$bdd->query('SELECT * FROM joueur jou join partie par on (jou.n_joueur=par.j_noir) or  (jou.n_joueur=par.j_blanc) join tournoi tou on par.tournoi=tou.n_tournoi where n_partie='.$n_partie.''); // si on coche rien
	$resultats0->setFetchMode(PDO::FETCH_OBJ);
	while( $resultat0 = $resultats0->fetch())
		{	
			
			//'<input type="submit" value="Pgn_viewer" onclick= "document.location=\''.$pgnviewer.''.$fichier.'&ParsePgn=2&SetScoreSheet=1\'" /> ', '</td>';

			$tour_nom = $resultat0->tour_nom;
			$site = $resultat0->site;
			$date = $resultat0->date;
			$round = $resultat0->round;

			$result = $resultat0->resultat;
			$coups =  $resultat0->coups;
			$nom_fichier = $n_partie.'.html';

			$partie = '[Event "'.$tour_nom.'"]'.'[Site "'.$site.'"]'.'[Date "'.$date.'"]'.'[Round "'.$round.'"]'.'[White "'.$white_nom.', '.$white_prenom.'"]'.'[Black "'.$black_nom.', '.$black_prenom.'"]'.'[Result "'.$result.'"]'.$coups;

			$fichier = fopen('pgnviewer/partie/'.$nom_fichier.'',"w");
			if($fichier!=null)
				fwrite($fichier,$partie);

			fclose($fichier);



			
			//"document.location=\''.$pgnviewer.''.$subject.'&ParsePgn=2&SetScoreSheet=1\'" />';
			
		}
		echo '</table>';
		echo'<table align="center" class="table table-striped" >';
		echo '<tr><td>';
		echo $white_nom .'&nbsp;'. $white_prenom .' vs '.$black_nom.'&nbsp;'.$black_prenom.'</td>'; 
		echo '<td>'.$round .'</td>';
		echo '<td>'.$result .'</td>';
		echo '<td>'.$date .'</td>';
		echo '<td>'.$site .'</td>';
		echo '<td>'.$tour_nom .'</td>';
		
		echo '</tr></table>';
		
		$resultats0->closeCursor();


		echo '<input type="submit" value="Visualiser la partie" onclick="window.open(\''.$pgnviewer.''.$subject.''.$nom_fichier.'&ParsePgn=2&SetScoreSheet=1\')"/>';

}//

?>


		<script>
			function RedirectionJavascript(){
  			document.location.href='\''.$pgnviewer.''.$fichier.'&ParsePgn=2&SetScoreSheet=1\''; 
			}
		</script>