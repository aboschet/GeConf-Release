<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Liste des ateliers</title>
        <link href="elements/style.css" rel="stylesheet">
    </head>
	
    <body>
	<?php include('Layout.php'); ?>

		<div id="Layout">
			<?php 
				&db=mysql_connect("localhost","root","") or die (mysql_error());
				$conbd= mysql_select_db("geconf",$db) or die (mysql_error());
				if(!$db) echo "erreur de connexion";
				if(!$conbd) echo"base de donnees introuvable";
				
				$list_atelier="SELECT * FROM atelier ORDER BY id DESC ";
				$req= mysql_query($list_atelier) or die('Erreur SQL !'.$list_atelier.'<br>'.mysql_error());	
				while ($data = mysql_fetch_array($req) )
				{
					echo '<li>' .&data["titre_definitif"] . '&emsp;' .&data["theme"] . '&emsp;' .&data["type"] .
					'&emsp;' .&data["laboratoire"] . '&emsp;' .&data["lieu"] . '&emsp;' .&data["duree"] . 
					'&emsp;' .&data["capacite"] . '&emsp;' .&data["type_inscription"] . '&emsp;' .&data["date"] . 
					'&emsp;' .&data["description"] . '&emsp;' .&data["animateur"] . '&emsp;' .&data["partenaire"].
					'&emsp;' .&data["public"]. '&emsp;' .&data["contenu_pedagogique"] . '&emsp;' ;
					echo '<a href="details_atelier.php?id=' .$data['id'] .'"> Modifier </a>';
					<?php
							if(!empty($_POST['supprimer'])) {
							$supprimerReq="DELETE FROM atelier WHERE id= '.$data['id'].'";
							mysql_query($supprimerReq) or die('Erreur SQL !'.$supprimerReq.'<br>'.mysql_error());
															}
					?>
 
					echo '<form action="' .<?php echo $_SERVER['PHP_SELF'];?>. '" method="POST">';
					echo '<input type="submit" id="supprimer" name="supprimer" value="Supprimer">
						  </form>';
					echo '</li>';
		
				}
			?>    
	   
       </div>
    </body>
</html>