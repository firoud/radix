<div class="row">


<div class="col-md-12 users form">
<?php echo $this->Form->create('User', array( 'class' => 'form-horizontal' , 'role' => 'form')); ?>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo __('Add New User'); ?></h3>
    <p><?php echo __('Create a brand new user and add them to this site.'); ?></p>
  </div>
  <div class="panel-body">


  
  	<div class="form-group">
    
      	<?php
		echo $this->Form->label('username' , __('Username') . ' <span class="description">(' . __('required') . ')</span>' ,  array( 'class' => 'control-label col-sm-3' ));
		echo $this->Form->input('username' , array( 'label' => false , 
		                                         'class' => 'form-control' , 
												 'div' => array( 'class' => 'col-sm-6' ),
												 
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
    
      	<?php echo $this->Form->label('send_password' , __('Send Password?') ,  array( 'class' => 'control-label col-sm-3' )); ?>
        
        <div class="col-sm-6">
        
		<?php echo $this->Form->input('send_password' , array( 'label' => __('Send this password to the new user by email.') , 
													'type' => 'checkbox',					
												    'div' => array( 'class' => 'checkbox' ),
												 
												 ));
		
		?>
        
        </div>
    
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
		
		echo $this->Form->submit(__('Add New User'), array( 'div' => false , 'class' => 'btn btn-primary' )); 
		
		?>
    
    
    </div>
  
  
</div>



<?php echo $this->Form->end(); ?>

</div>

</div>
