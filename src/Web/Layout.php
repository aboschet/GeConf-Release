
<?php
  $path = $_SERVER['PHP_SELF'];
  $current = basename ($path);
?>

<ul id="Layout">
	<li <?php if ($current == 'List_Atelier.php'){ echo 'class="active"';} else; ?>><a href="List_Atelier.php">Lister Les Ateliers</a></li>
	<li <?php if ($current == 'Creation_Atelier'){ echo 'class="active"';} else; ?>><a href="Creation_Atelier.php">Créer / Modifier</a></li>
</ul>
<br>