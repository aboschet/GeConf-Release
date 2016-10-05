<?php

	$db = mysqli_connect("localhost", "root", "", "geconf") or die(mysql_error());
	if(!$db) echo "erreur de connexion";

	if (isset($_POST['send']))
	{
		if (isset($_POST['modify']))
		{
			$requete = "UPDATE `atelier` SET `titre_definitif` = '" . $_POST['title'] . "', `theme` = '" . $_POST['theme'] . "', `type` = '" . $_POST['type'] . "', `laboratoire` = '" . $_POST['laboratoire'] . "', `lieu` = '" . $_POST['lieu'] . "', `duree` = '" . $_POST['duree'] . "', `capacite` = '" . $_POST['capacity'] . "', `type_inscription` = '" . $_POST['inscription_type'] . "', `date` = '" . $_POST['date'] . "', `description` = '" . $_POST['description'] . "', `animateur` = '" . $_POST['animateur']. "', `partenaire` = '" . $_POST['partenaire'] . "', `public` = '" . $_POST['public'] . "', `contenu_pedagogique` = '" . $_POST['contenu'] . "' WHERE `atelier`.`id` = " . $_POST['id'];
		}
		else
		{
			$requete = "INSERT INTO `atelier` (`id`, `titre_definitif`, `theme`, `type`, `laboratoire`, `lieu`, `duree`, `capacite`, `type_inscription`, `date`, `description`, `animateur`, `partenaire`, `public`, `contenu_pedagogique`) VALUES (NULL, '" . $_POST['title'] . "', '" . $_POST['theme'] . "', '" . $_POST['type'] . "', '" . $_POST['laboratoire'] . "', '" . $_POST['lieu'] . "', '" . $_POST['duree'] . "', '" . $_POST['capacity'] . "', '" . $_POST['inscription_type'] . "', '" . $_POST['date'] . "', '" . $_POST['description'] . "', '" . $_POST['animateur'] . "', '" . $_POST['partenaire'] . "', '" . $_POST['public'] . "', '" . $_POST['contenu'] . "');";
		}

		$req = mysqli_query($db, $requete) or die('Erreur SQL ! (' . mysql_error() . ')');

		header('Location: List_Atelier.php');
	}

	// Request all laboratories
	$req= mysqli_query($db, "SELECT * FROM laboratoire ORDER BY id DESC") or die('Erreur SQL !('. mysql_error() . ')');
	$laboratoires = [];
	while ($row = mysqli_fetch_array($req, MYSQLI_ASSOC))
	{
		$laboratoires[] = $row;
	}
	mysqli_free_result($req);

	// Check if it's a modification
	$modify = false;
	if (isset($_GET['id']))
	{
		$req = mysqli_query($db, "SELECT * from atelier WHERE id=" . $_GET['id']) or die('Erreur SQL !('. mysql_error() . ')');
		$atelier = mysqli_fetch_array($req, MYSQLI_ASSOC);
		$modify = true;
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Créer un atelier</title>
        <link href="elements/style.css" rel="stylesheet">
    </head>
	
    <body>
	<?php include('Layout.php'); ?>
		<div>
			<form action="<?= $_SERVER["PHP_SELF"]; ?><?php if($modify) echo "?modify&id=" . $_GET['id']; ?>" method="post">
				<table style="margin: auto;">
					<tr>
						<td>
							Titre définitif:
						</td>
						<td width="10px"></td>
						<td>
							<input type="text" id="title" name="title" value="<?php if($modify) echo $atelier["titre_definitif"]; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Thème:
						</td>
						<td width="10px"></td>
						<td>
							<input type="text" id="theme" name="theme" value="<?php if($modify) echo $atelier["theme"]; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Type:
						</td>
						<td width="10px"></td>
						<td>
							<input type="text" id="type" name="type" value="<?php if($modify) echo $atelier["type"]; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Laboratoire:
						</td>
						<td width="10px"></td>
						<td>
							<select name="laboratoire">
							<?php
								foreach($laboratoires as $labo)
								{
									?>
									<option value="<?= $labo['id']; ?>" <?php if ($modify && $labo['id'] == $atelier['laboratoire']) echo "selected"; ?>><?= $labo['nom']; ?></option>
									<?php
								}
							?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							Lieu:
						</td>
						<td width="10px"></td>
						<td>
							<input type="text" id="lieu" name="lieu" value="<?php if($modify) echo $atelier["lieu"]; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Durée:
						</td>
						<td width="10px"></td>
						<td>
							<input type="text" id="duree" name="duree" value="<?php if($modify) echo $atelier["duree"]; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Capacité:
						</td>
						<td width="10px"></td>
						<td>
							<input type="text" id="capacity" name="capacity" value="<?php if($modify) echo $atelier["capacite"]; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Type d'inscription:
						</td>
						<td width="10px"></td>
						<td>
							<input type="text" id="inscription_type" name="inscription_type" value="<?php if($modify) echo $atelier["type_inscription"]; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Date:
						</td>
						<td width="10px"></td>
						<td>
							<input type="text" id="date" name="date" value="<?php if($modify) echo $atelier["date"]; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Description:
						</td>
						<td width="10px"></td>
						<td>
							<textarea name="description"><?php if($modify) echo $atelier["description"]; ?></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Animateur:
						</td>
						<td width="10px"></td>
						<td>
							<input type="text" id="animateur" name="animateur" value="<?php if($modify) echo $atelier["animateur"]; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Partenaire:
						</td>
						<td width="10px"></td>
						<td>
							<input type="text" id="partenaire" name="partenaire" value="<?php if($modify) echo $atelier["partenaire"]; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Public:
						</td>
						<td width="10px"></td>
						<td>
							<input type="text" id="public" name="public" value="<?php if($modify) echo $atelier["public"]; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Contenu pédagogique:
						</td>
						<td width="10px"></td>
						<td>
							<textarea name="contenu"><?php if($modify) echo $atelier["contenu_pedagogique"]; ?></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<input type="hidden" name="send" />
							<?php
								if ($modify)
								{
									?>
									<input type="hidden" name="modify" />
									<input type="hidden" name="id" value="<?= $atelier['id']; ?>" />
									<?php
								}
							?>
							<input type="submit" value="Enregistrer" />
						</td>
					</tr>
				</table>
			</form>
       </div>
    </body>
</html>