<div class="row">

<div class="col-md-12 terms form">

<?php echo $this->Form->create('Term', array( 'class' => 'form-horizontal' , 'role' => 'form')); ?>



<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo __('Edit Tag'); ?></h3>
  </div>
  <div class="panel-body">
  
  	<div class="form-group">
    
      	<?php
		echo $this->Form->label('name' , __('Name'),  array( 'class' => 'control-label col-sm-2' ));
		echo $this->Form->input('name' , array( 'label' => false , 
		                                         'class' => 'form-control' , 
												 'div' => array( 'class' => 'col-sm-10' ),
												 'after' => '<div class="help-block">' . __('The name is how it appears on your site.') .  '</div>' 
												 
												 ));
		
		?>
    
    </div>
    
    
    
  
  	<div class="form-group">
    
      	<?php
		echo $this->Form->label('slug' , __('Slug'),  array( 'class' => 'control-label col-sm-2' ));
		echo $this->Form->input('slug' , array( 'label' => false , 
		                                         'class' => 'form-control' , 
												 'div' => array( 'class' => 'col-sm-10' ),
												 'after' => '<div class="help-block">' . __('The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.') .  '</div>' 
												 
												 ));
		
		?>
    
    </div>
    
    
    
  	<div class="form-group">
    
      	<?php
		echo $this->Form->label('description' , __('Description'),  array( 'class' => 'control-label col-sm-2' ));
		echo $this->Form->input('description' , array( 'label' => false , 
		                                         'class' => 'form-control' , 
												 'div' => array( 'class' => 'col-sm-10' ),
												 'after' => '<div class="help-block">' . __('The description is not prominent by default; however, some themes may show it.') .  '</div>' 
												 
												 ));
		
		?>
    
    </div>         
  
  
  	<?php
		echo $this->Form->input('id');	
		echo $this->Form->input('taxonomy' , array('type' => 'hidden', 'value' => 'post_tag'));
	?>
  
  </div>
  
  
    <div class="panel-footer">
    
      	<?php
		
		echo $this->Form->submit(__('Update'), array( 'div' => false , 'class' => 'btn btn-primary' )); 
		
		?>
    
    
    </div>
  
  
</div>





<?php echo $this->Form->end(); ?>
</div>
</div>