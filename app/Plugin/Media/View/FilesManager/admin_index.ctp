        <?php 


echo $this->html->css(array(
						'jquery-ui',
						'Media.elfinder.min',
						'Media.theme'


));


echo $this->html->script(array(
						'jquery-ui.min',
						'Media.elfinder.min'


)); 


?>



		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			$().ready(function() {
				var elf = $('#elfinder').elfinder({
					url : 'http://localhost/radix/media/php/connector.php'  // connector URL (REQUIRED)
					// lang: 'ru',             // language (OPTIONAL)
				}).elfinder('instance');
			});
		</script>
		
		
		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>		