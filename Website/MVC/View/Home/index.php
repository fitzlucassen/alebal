<title>Alébal - Official</title>

<?php
	// inclure ci-dessus les balises à inclure dans la balise <head> du layout
	$this->endSection('head');
	// inclure ci-dessous les balises à inclure à la fin de votre DOM
	$this->beginSection();
?>
<?php
	$this->endSection('scripts');
	$this->beginSection();

	// START CONTENT
	// Intégrer ci-dessous la vue
?>
<div id="page" class="home-page">
	<div class="collection">
		<a href="#!" class="collection-item"><span class="new badge" data-badge-caption="">11 - 0</span>Thibault - Roberte</a>
		<a href="#!" class="collection-item"><span class="new badge" data-badge-caption="">12 - 14</span>Michael - Christophe</a>
	</div>

	<p style="position: absolute;bottom:2.5%;right:2.5%;">
		<a href="#modal1" class="btn-floating btn-large waves-effect waves-light red waves-effect waves-light btn"><i class="material-icons">add</i></a>

		<div id="modal1" class="modal modal-fixed-footer">
			<form method="post" action="" class="col s12">
				<div class="modal-content">
					<h4 class="heading">Ajouter un match</h4>
					<br/>
					<div class="row">
						<div class="row">
							<div class="input-field col s12">
								<select>
									<option value="" disabled selected>Choisir le joueur 1</option>
									<option value="1">Thibault</option>
									<option value="2">Roberte</option>
									<option value="3">Michael</option>
								</select>
								<label>Joueur 1</label>
							</div>
							<div class="input-field col s12">
								<select>
									<option value="" disabled selected>Choisir le joueur 2</option>
									<option value="1">Thibault</option>
									<option value="2">Roberte</option>
									<option value="3">Michael</option>
								</select>
								<label>Joueur 2</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Valider</a>
				</div>
			</form>
		</div>
	</p>
</div>
