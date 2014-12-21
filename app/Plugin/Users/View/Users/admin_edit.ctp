<div class="row">


<div class="col-md-12 users form">
<?php echo $this->Form->create('User', array( 'class' => 'form-horizontal' , 'role' => 'form')); ?>

<?php echo $this->Form->input('id'); ?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo __('Edit User'); ?></h3>
  </div>
  <div class="panel-body">


  
  	<div class="form-group">
    
      	<?php
		echo $this->Form->label('username' , __('Username') . ' <span class="description">(' . __('required') . ')</span>' ,  array( 'class' => 'control-label col-sm-3' ));
		echo $this->Form->input('username' , array( 'label' => false , 
		                                         'class' => 'form-control' , 
												 'div' => array( 'class' => 'col-sm-6' ),
												 'disabled' => 'disabled',
												 'after' =>  '<div class="help-block">' . __('Usernames cannot be changed.') . '</div>'
												 
												 ));
		
		?>
    
    </div>



  
  	<div class="form-group">
    
      	<?php
		echo $this->Form->label('email' , __('E-mail') . ' <span class="description">(' . __('required') . ')</span>' ,  array( 'class' => 'control-label col-sm-3' ));
		echo $this->Form->input('email' , array( 'label' => false , 
		                                         'class' => 'form-control' , 
												 'div' => array( 'class' => 'col-sm-6' ),
												 
												 ));
		
		?>
    
    </div>
    


  
  	<div class="form-group">
    
      	<?php
		echo $this->Form->label('first_name' , __('First Name') ,  array( 'class' => 'control-label col-sm-3' ));
		echo $this->Form->input('first_name' , array( 'label' => false , 
		                                         'class' => 'form-control' , 
												 'div' => array( 'class' => 'col-sm-6' ),
												 
												 ));
		
		?>
    
    </div> 
    
    
  	<div class="form-group">
    
      	<?php
		echo $this->Form->label('last_name' , __('Last Name') ,  array( 'class' => 'control-label col-sm-3' ));
		echo $this->Form->input('last_name' , array( 'label' => false , 
		                                         'class' => 'form-control' , 
												 'div' => array( 'class' => 'col-sm-6' ),
												 
												 ));
		
		?>
    
    </div> 
    
           
    
    
  	<div class="form-group">
    
      	<?php
		echo $this->Form->label('url' , __('Website') ,  array( 'class' => 'control-label col-sm-3' ));
		echo $this->Form->input('url' , array( 'label' => false , 
		                                         'class' => 'form-control' , 
												 'div' => array( 'class' => 'col-sm-6' ),
												 
												 ));
		
		?>
    
    </div> 
    
    
    
    
  	<div class="form-group">
    
      	<?php
		echo $this->Form->label('password' , __('Password')  . ' <span class="description">(' . __('required') . ')</span>' ,  array( 'class' => 'control-label col-sm-3' ));
		echo $this->Form->input('password' , array( 'label' => false , 
		                                         'class' => 'form-control' , 
												 'div' => array( 'class' => 'col-sm-6' ),
												 'value' => ''
												 
												 ));
		
		?>
    
    </div> 
    
    
    
    
    
    
  	<div class="form-group">
    
      	<?php
		echo $this->Form->label('repeat_password' , __('Repeat Password')  . ' <span class="description">(' . __('required') . ')</span>' ,  array( 'class' => 'control-label col-sm-3' ));
		echo $this->Form->input('repeat_password' , array( 'label' => false , 
													'type' => 'password',					
		                                            'class' => 'form-control' , 
												    'div' => array( 'class' => 'col-sm-6' ),
												 
												 ));
		
		?>
    
    </div>   
      
    
    
    
    
    
  	<div class="form-group">
    
      	<?php
		
		$roles = array(
			'administrator' => __('Administrator'),	
			'editor' => __('Editor'),	
			'author' => __('Author'),	
			'contributor' => __('Contributor'),	
			'subscriber' => __('Subscriber')							
		);
		
		echo $this->Form->label('role' , __('Role') ,  array( 'class' => 'control-label col-sm-3' ));
		echo $this->Form->input('role' , array( 'label' => false ,
		                                         'type' => 'select',  
												 'options' => $roles,   
		                                         'class' => 'form-control' , 
												 'div' => array( 'class' => 'col-sm-3' ),
												 
												 ));
		
		?>
    
    </div>             

	<?php

		echo $this->Form->input('status', array('type' => 'hidden' , 'value' => 1));
	?>


  </div>
  
  
    <div class="panel-footer">
    
      	<?php
		
		echo $this->Form->submit(__('Update User'), array( 'div' => false , 'class' => 'btn btn-primary' )); 
		
		?>
    
    
    </div>
  
  
</div>



<?php echo $this->Form->end(); ?>

</div>

</div>