<?php


		
		if($blanc==1 && $noir==0){
		$resultats1=$bdd->query("SELECT * FROM joueur jou join partie par on jou.n_joueur=par.j_blanc join tournoi tou on par.tournoi=tou.n_tournoi where jou_NOM like '%$nom%' and jou_PRENOM like '%$prenom%' and tou.tour_NOM like '%$tournoi%' and tou.SITE like '%$lieu%' and par.resultat = '1-0'");
		$resultats1->setFetchMode(PDO::FETCH_OBJ);
			$i=0;
			while( $resultat1 = $resultats1->fetch())
			{	
			
				
			
				if($i==0){
				echo 'Joueur blanc <table border="1" class="table table-striped">';
				$i++;}

				$n_partie = $resultat1->n_partie;
				
				
				echo '<tr><td>';
				echo $resultat1->jou_nom .'&nbsp;'. $resultat1->jou_prenom .'</td>'; 
				echo '<td>'.$resultat1->round .'</td>';
				echo '<td>'.$resultat1->resultat .'</td>';
				echo '<td>'.$resultat1->date .'</td>';
				echo '<td>'.$resultat1->site .'</td>';
				echo '<td>'.$resultat1->tour_nom .'</td>';
				echo '<form action = "'.$_SERVER['PHP_SELF'].'" method="post" enctype="multipart/form-data">';
				echo '<input type="hidden" name="n_partie" value="'.$n_partie.'">';
				echo '<td><input type="submit" value="charger" onclick=""></td>';
				echo '</form>';
				echo '</tr>';
						

			}
			echo '</table>';
			$resultats1->closeCursor();
		}
		if($blanc == $noir){
			$resultats2=$bdd->query("SELECT * FROM joueur jou join partie par on jou.n_joueur=par.j_blanc join tournoi tou on par.tournoi=tou.n_tournoi where jou_NOM like '%$nom%' and jou_PRENOM like '%$prenom%' and tou.tour_NOM like '%$tournoi%' and tou.SITE like '%$lieu%' and par.resultat = '1-0'");
			$resultats2->setFetchMode(PDO::FETCH_OBJ);
			$i=0;
			while( $resultat2 = $resultats2->fetch())
			{	
			
				if($i==0){
				echo 'Joueur blanc <table border="1" class="table table-striped">';
				$i++;}
				
				$n_partie = $resultat2->n_partie;
				
				
				echo '<tr><td>';
				echo $resultat2->jou_nom .'&nbsp;'. $resultat2->jou_prenom .'</td>'; 
				echo '<td>'.$resultat2->round .'</td>';
				echo '<td>'.$resultat2->resultat .'</td>';
				echo '<td>'.$resultat2->date .'</td>';
				echo '<td>'.$resultat2->site .'</td>';
				echo '<td>'.$resultat2->tour_nom .'</td>';
				echo '<form action = "'.$_SERVER['PHP_SELF'].'" method="post" enctype="multipart/form-data">';
				echo '<input type="hidden" name="n_partie" value="'.$n_partie.'">';
				echo '<td><input type="submit" value="charger" onclick=""></td>';
				echo '</form>';
				echo '</tr>';
				
				
			}
			echo '</table>';
			$resultats2->closeCursor();
			
			$resultats3=$bdd->query("SELECT * FROM joueur jou join partie par on jou.n_joueur=par.j_noir join tournoi tou on par.tournoi=tou.n_tournoi where jou_NOM like '%$nom%' and jou_PRENOM like '%$prenom%' and tou.tour_NOM like '%$tournoi%' and tou.SITE like '%$lieu%' and par.resultat = '1-0'");
		$resultats3->setFetchMode(PDO::FETCH_OBJ);
			$i=0;
			while( $resultat3 = $resultats3->fetch())
			{	
			
				if($i==0){
				echo 'Joueur noir <table border="1" class="table table-striped">';
				$i++;}
				
				
				$n_partie = $resultat3->n_partie;
				
				
				echo '<tr><td>';
				echo $resultat3->jou_nom .'&nbsp;'. $resultat3->jou_prenom .'</td>'; 
				echo '<td>'.$resultat3->round .'</td>';
				echo '<td>'.$resultat3->resultat .'</td>';
				echo '<td>'.$resultat3->date .'</td>';
				echo '<td>'.$resultat3->site .'</td>';
				echo '<td>'.$resultat3->tour_nom .'</td>';
				echo '<form action = "'.$_SERVER['PHP_SELF'].'" method="post" enctype="multipart/form-data">';
				echo '<input type="hidden" name="n_partie" value="'.$n_partie.'">';
				echo '<td><input type="submit" value="charger" onclick=""></td>';
				echo '</form>';
				echo '</tr>';
			}
			echo '</table>';
			$resultats3->closeCursor();
			
		}
		if($blanc==0 && $noir==1){
		$resultats4=$bdd->query("SELECT * FROM joueur jou join partie par on jou.n_joueur=par.j_noir join tournoi tou on par.tournoi=tou.n_tournoi where jou_NOM like '%$nom%' and jou_PRENOM like '%$prenom%' and tou.tour_NOM like '%$tournoi%' and tou.SITE like '%$lieu%' and par.resultat = '1-0'");
		$resultats4->setFetchMode(PDO::FETCH_OBJ);
			$i=0;
			while( $resultat4 = $resultats4->fetch())
			{	
			
				if($i==0){
				echo 'Joueur noir <table border="1" class="table table-striped">';
				$i++;}
				
				
				$n_partie = $resultat4->n_partie;
				
				
				echo '<tr><td>';
				echo $resultat4->jou_nom .'&nbsp;'. $resultat4->jou_prenom .'</td>'; 
				echo '<td>'.$resultat4->round .'</td>';
				echo '<td>'.$resultat4->resultat .'</td>';
				echo '<td>'.$resultat4->date .'</td>';
				echo '<td>'.$resultat4->site .'</td>';
				echo '<td>'.$resultat4->tour_nom .'</td>';
				echo '<form action = "'.$_SERVER['PHP_SELF'].'" method="post" enctype="multipart/form-data">';
				echo '<input type="hidden" name="n_partie" value="'.$n_partie.'">';
				echo '<td><input type="submit" value="charger" onclick=""></td>';
				echo '</form>';
				echo '</tr>';
				
				
			}
			echo '</table>';
			$resultats4->closeCursor();
		}
		
		
		
			
			echo '</br>';
			
		
		
		
		
		
		
		
		
		/*else {
		if (empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['tournoi']) && empty($_POST['noir']) && empty($_POST['blanc'])){
			
			$resultatsall=$bdd->query("SELECT * FROM joueur jou join partie par on jou.n_joueur=par.j_blanc join tournoi tou on par.tournoi=tou.n_tournoi");
		$resultatsall->setFetchMode(PDO::FETCH_OBJ);
			echo 'Joueur blanc <table border="1">';
			while( $resultatall = $resultatsall->fetch())
			{	
				$n_partie = $resultatall->n_partie;
				
				
				echo '<tr><td>';
				echo $resultatall->jou_nom, '&nbsp;', $resultatall->jou_prenom, '</td> <td>',
				

				$resultatall->round,'</td> <td>', $resultatall->resultat, '</td> <td>', 
				$resultatall->date,'</td> <td>', $resultatall->site,'</td> <td>', $resultatall->tour_nom, '<br>';
				echo '<tr><td>';
				echo $resultat1->jou_nom .'&nbsp;'. $resultat1->jou_prenom .'</td>'; 
				echo '<td>'.$resultat1->round .'</td>';
				echo '<td>'.$resultat1->resultat .'</td>';
				echo '<td>'.$resultat1->date .'</td>';
				echo '<td>'.$resultat1->site .'</td>';
				echo '<td>'.$resultat1->tour_nom .'</td>';
				echo '<form action = "'.$_SERVER['PHP_SELF'].'" method="post" enctype="multipart/form-data">';
				echo '<input type="hidden" name="n_partie" value="'.$n_partie.'">';
				echo '<td><input type="submit" value="charger" onclick=""></td>';
				echo '</form>';
				echo '</tr>';
						

			}
			echo '</table>';
			$resultatsall->closeCursor();
			
		
		
		}
	}*/








?>