

 <h2>>Recherche </h2>
 <link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<form action = "<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend><h3>Parties</h3></Legend>
		
		<?php
		if (isset ($_POST['blanc']))
		echo '<label for="blanc"> Joueur blanc </label><input type ="checkbox" id="blanc" name="blanc" checked>';
		else
		echo '<label for="blanc"> Joueur blanc </label><input type ="checkbox" id="blanc" name="blanc">';
		?>
		
		
		<?php
		if (isset ($_POST['noir']))
		echo '<label for="noir"> Joueur noir </label><input type ="checkbox" id="noir" name="noir" checked>';
		else
		echo '<label for="noir"> Joueur noir </label><input type ="checkbox" id="noir" name="noir">';
		?>
		
		<br/>
		
        <label for="nom">Nom Joueur: </label>
        <input type="search" id="nom" name="nom" value="<?php if (isset($_POST['nom'])) echo $_POST['nom'] ?>"/>
		
		<label for="prenom">Prenom Joueur: </label>
        <input type="search" id="prenom" name="prenom" value="<?php if (isset($_POST['prenom'])) echo $_POST['prenom'] ?>"/>
        
		
        <label for="nom_tournoi">Tournoi: </label>
        <input type="search" id="nom_tournoi" name="nom_tournoi" value="<?php if (isset($_POST['nom_tournoi'])) echo $_POST['nom_tournoi'] ?>"/>
		
		<label for="lieu">Lieu: </label>
        <input type="search" id="lieu" name="lieu" value="<?php if (isset($_POST['lieu'])) echo $_POST['lieu'] ?>"/>
		
		<br/>
		
		<label for="ouverture">Ouverture : </label>
        <select name="ouverture" size="1" value="<?php if (isset($_POST['ouverture'])) echo $_POST['ouverture'] ?>">
		<?php
		
			//for($i=0;$i<1;$i++){
				echo '<option value ="Nom des ouvertures">'.'Nom des ouvertures';
			//	}
				echo '</option>';
		?>
		</select>
		
		<label for="annee">Annee : </label>
        <select name="annee" size="1">
		<?php
			echo '<option value = "" >';
			for($i=1900;$i<2015;$i++){
				echo '<option value ="'.$i.'">'.$i;
				}
				echo '</option>';
		?>
		</select>
		
		
		
		<br/>
		
		<label for="gagnee"> Partie Gagnee </label>
		<input type ="checkbox" id="gagnee" name="gagnee">
		
		<label for="perdue"> Partie Perdue </label>
		<input type ="checkbox" id="perdue" name="perdue">
		
		<label for="nulle"> Partie Nulle </label>
		<input type ="checkbox" id="nulle" name="nulle">
		
		<br/>
		
		
		<input type="submit" name="Rechercher" value="Rechercher"/>
		
		
     </fieldset>
</body>