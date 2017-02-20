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
            <table class="striped bordered highlight centered responsive-table">
                <thead>
                    <tr>
                        <th></th>
                        <?php
                            foreach ($this->Model->competitors as $key => $competitor) {
                        ?>
                            <th class="data-field"><?php echo $competitor->getName(); ?></th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($this->Model->competitors as $key => $competitor1) {
                    ?>
                            <tr>
                                <td><?php echo $competitor1->getName(); ?></td>
                                <?php
                                    foreach ($this->Model->competitors as $key => $competitor2) {
                                ?>
                                <td class="<?php echo $competitor1->getId() == $competitor2->getId() ? "red" : ""; ?>">
                                    <?php 
                                        if($competitor1->getId() == $competitor2->getId())
                                            echo '/';
                                        else if(array_key_exists($competitor1->getId() . '-' . $competitor2->getId(), $this->Model->events))
                                            echo $this->Model->events[$competitor1->getId() . '-' . $competitor2->getId()];
                                        else if(array_key_exists($competitor2->getId() . '-' . $competitor1->getId(), $this->Model->events))
                                            echo $this->Model->events[$competitor2->getId() . '-' . $competitor1->getId()];
                                        else
                                            echo '0';
                                    ?>
                                </td>
                                <?php
                                    }
                                ?>
                            </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
		</div>
	</div>
</div>