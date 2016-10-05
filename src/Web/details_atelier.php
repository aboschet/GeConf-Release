<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Les details </title>
        <link href="elements/style.css" rel="stylesheet">
    </head>
	
    <body>
	<?php include('Layout.php'); ?>
	
	<div id="Layout">
	
		<h1> <center> Informations sur l'atelier </center> </h1>
	
		<?php 
				&db=mysql_connect("localhost","root","") or die (mysql_error());
				$conbd= mysql_select_db("geconf",$db) or die (mysql_error());
				if(!$db) echo "erreur de connexion";
				if(!$conbd) echo"base de donnees introuvable";
				$detail_atelier="SELECT titre_definitif, theme, type, laboratoire, lieu, duree, description FROM atelier WHERE id=".$_GET['id']."";
				mysql_query($detail_atelier) or die('Erreur SQL !'.$detail_atelier.'<br>'.mysql_error());	
				
				echo '<table> 
						<tr>';
							echo '<td> <b> Titre definitif </b> </td>';
							echo '<td>' .$data["titre_definitif"]. '</td>';
					echo '</tr>';
					echo '<tr>';
							echo '<td> <b> theme </b> </td>';
							echo '<td>' .$data["theme"]. '</td>';
					echo '</tr>';
					echo '<tr>';
							echo '<td>  <b> Type </b> </td>';
							echo '<td>' .$data["type"]. '</td>';
					echo '</tr>';
					echo '<tr>';
					        echo '<td> <b> Laboratoire </b> </td>';
							echo '<td>' .$data["laboratoire"]. '</td>';
					echo '</tr>';
					echo '<tr>';
					        echo '<td> <b> Lieu </b> </td>';
							echo '<td>' .$data["lieu"]. '</td>';	
                    echo '</tr>';
					echo '<tr>';
					        echo '<td> <b> Duree </b> </td>';
							echo '<td>' .$data["duree"]. '</td>';	
					echo '</tr>';
					echo '<tr>';
					        echo '<td> <b> Description </b> </td>';
							echo '<td>' .$data["description"]. '</td>';
					echo '</tr>';		
				echo '</table>' ;
    ?>
				
	</div>
	</body>
</html>