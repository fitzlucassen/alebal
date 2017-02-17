<!-- Required script -->
<!-- Compiled and minified JavaScript -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<script type="text/javascript" src="/<?php echo __js_directory__  ; ?>/_built.js"></script>

<?php
	if(isset($this->Sections['scripts']))
		$this->render($this->Sections['scripts']);
?>