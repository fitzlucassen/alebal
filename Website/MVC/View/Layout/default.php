<!DOCTYPE HTML>
<html>
<head>
	<?php
	// La page à modifier pour inclure le CSS le JS et les balises meta du layout (toutes les pages)
	include(__partial_directory__ . "/meta.php");

	// L'inclusion des CSS, JS et HTML personnalisés pour chaque page
	// C'est à remplir dans les vues.
	$this->render($this->Sections['head']);
	?>
</head>

<body>
<div id="global">
	<?php
		include(__partial_directory__ . "/header.php");
		// Inclusion de la vue cible
		$this->render($this->Sections['body']);
	?>
	<div class="cl"></div>
	<?php
		include(__partial_directory__ . "/footer.php");
	?>
</div>

<?php
	if(isset($this->Sections['scripts']))
		$this->render($this->Sections['scripts']);
?>
</body>
</html>