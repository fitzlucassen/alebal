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
		<div class="card">
			<div class="collection">
				<?php
					$cpt = 1;
					foreach ($this->Model->classement as $key => $value) {
				?>
					<a href="#!" class="collection-item">
						<span class="new badge" data-badge-caption=" victoires"><?php echo $value; ?></span>
						<?php echo $cpt; ?> - <?php echo $this->Model->repository->getById($key)->getName();?>
					</a>
				<?php
						$cpt++;
					}
				?>
			</div>
		</div>
	</div>
</div>