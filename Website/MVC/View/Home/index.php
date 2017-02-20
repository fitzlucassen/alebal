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
	<div class="row" style="padding: 2.5%;">
		<?php
			foreach ($this->Model->events as $date => $events) {
		?>
			<h4 class="heading"><?php echo $date; ?></h4>
			<div class="card">
				<div class="collection">
					<?php
						foreach ($events as $key2 => $value) {
							$score1 = $value->getScore_Competitor1(); 
							$score2 = $value->getScore_Competitor2(); 
					?>
						<a href="#!" class="collection-item">
							<span class="new badge" data-badge-caption=""><?php echo ($score1 == 0 ? '0' : $score1) . ' - ' . ($score2 == 0 ? '0' : $score2); ?></span>
							<span class="<?php echo $score1 > $score2 ? 'teal-text' : 'red-text'; ?>"><?php echo $value->getCompetitor1($this->Model->repository)->getName();?></span>
							- 
							<span class="<?php echo $score1 < $score2 ? 'teal-text' : 'red-text'; ?>"><?php echo $value->getCompetitor2($this->Model->repository)->getName();?></span>
						</a>
					<?php
						}
					?>
				</div>
			</div>
		<?php
			}
		?>
	</div>
	<p style="position: fixed;bottom:2.5%;right:2.5%;">
		<a href="#modal1" class="btn-floating btn-large waves-effect waves-light red waves-effect waves-light btn"><i class="material-icons">add</i></a>

		<div id="modal1" class="modal modal-fixed-footer">
			<form method="post" action="" class="col s12">
				<div class="modal-content">
					<h4 class="heading" style="border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 2.5%;">Ajouter un match</h4>
					<br/>
					<div class="row">
						<h5 class="heading">Joueurs du match</h4>
						
						<div class="input-field col s12">
							<select name="id_Competitor1">
								<option value="" disabled selected>Choisir le joueur 1</option>
								
								<?php
									foreach ($this->Model->competitors as $key => $value) {
								?>
									<option value="<?php echo $value->getId(); ?>"><?php echo $value->getName(); ?></option>
								<?php
									}
								?>
							</select>
							<label>Joueur 1</label>
						</div>
						<div class="input-field col s12">
							<select name="id_Competitor2">
								<option value="" disabled selected>Choisir le joueur 2</option>

								<?php
									foreach ($this->Model->competitors as $key => $value) {
								?>
									<option value="<?php echo $value->getId(); ?>"><?php echo $value->getName(); ?></option>
								<?php
									}
								?>
							</select>
							<label>Joueur 2</label>
						</div>
					</div>
					<div class="row">
						<h5 class="heading">Score du match</h4>
						
						<div class="input-field col s6">
							<input name="score1" type="number" class="validate">
							<label for="score1">Score joueur 1</label>
						</div>
						<div class="input-field col s6">
							<input name="score2" type="number" class="validate">
							<label for="score2">Score joueur 2</label>
						</div>
					</div>
					<div class="row">
						<h5 class="heading">Date du match</h4>
						
						<div class="input-field col s12">
							<input type="text" name="date" class="datepicker">
							<label for="score2">Date du match</label>
						</div>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " value="Valider"/>
				</div>
			</form>
		</div>
	</p>
</div>
