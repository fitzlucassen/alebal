<!-- Required script -->
<script type="text/javascript" src="/<?php echo __js_directory__  ; ?>/Module/jquery-1.10.min.js"></script>
<script type="text/javascript" src="/<?php echo __js_directory__  ; ?>/_built.js"></script>

<?php
	if(isset($this->Sections['scripts']))
		$this->render($this->Sections['scripts']);
?>