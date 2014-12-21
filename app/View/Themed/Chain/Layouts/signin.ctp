<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
	     <?php echo $this->fetch('meta'); ?>        
		<!-- start: Favicon -->
		<?php echo $this->Html->meta('icon'); ?>
		<!-- end: Favicon -->   

	<title><?php echo $this->fetch('title'); ?></title>
	
		
	   <?php  
	   
			echo $this->fetch('css');
			echo $this->fetch('script'); 
			echo $this->html->scriptBlock('var siteURL = "' . $this->html->url('/', true) . '"');
			  
			 
	   ?>	
		
		
		

		<?php 
		
		echo $this->Html->css(array(
								'style.default'
						)); 
		?>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
		<?php 
		
		echo $this->Html->script(array(
								'html5shiv',
								'respond.min'
						)); 
		?> 
        <![endif]-->
    </head>

    <body class="signin">
        
        
        <section>
            

					
					
					 

			         <?php echo $this->fetch('content'); ?>
                    

                    

            
        </section>


    <?php 
	
	echo $this->Html->script(array(
							'jquery-1.11.1.min',
							'jquery-migrate-1.2.1.min',
							'bootstrap.min',
							'modernizr.min',
							'pace.min',
							'retina.min',
							'jquery.cookies',
							
	)); 
	?>

    

    </body>
</html>
