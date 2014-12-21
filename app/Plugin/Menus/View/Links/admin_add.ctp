<div class="row">

<div class="links form col-md-12">

<?php echo $this->Form->create('Link', array( 'class' => 'form-horizontal' , 'role' => 'form')); ?>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo __('Add New Link'); ?></h3>
  </div>
  <div class="panel-body">
 
 
 <div class="form-group">


	<?php
		echo $this->Form->label('title', __('Menu link title') . ' <span title="'. __('This field is required.') . '" class="form-required">*</span>', array( 'class' => 'col-sm-2 control-label'));
		echo $this->Form->input('title', array( 'label' => false , 'class' => 'form-control', 'div' => array('class' => 'col-sm-6') ));		
	?>


</div>
 
 
 <div class="form-group">


	<?php
		echo $this->Form->label('path', __('URL') . ' <span title="'. __('This field is required.') . '" class="form-required">*</span>', array( 'class' => 'col-sm-2 control-label'));
		echo $this->Form->input('path', array( 'label' => false , 'class' => 'form-control', 'div' => array('class' => 'col-sm-6') ));		
	?>


</div> 


 
 <div class="form-group">


	<?php
		echo $this->Form->label('description', __('Description'), array( 'class' => 'col-sm-2 control-label'));
		echo $this->Form->input('description', array( 'label' => false , 'class' => 'form-control', 'div' => array('class' => 'col-sm-10') ));		
	?>


</div> 


 <div class="form-group">
	 <div class="col-sm-offset-2 col-sm-10">

	<?php
		echo $this->Form->input('enabled', array( 'label' => __('Enabled') , 'default' => 1, 'div' => array('class' => 'checkbox') ));		
	?>
	</div>
</div> 


 <div class="form-group">


	<?php
		echo $this->Form->label('parent_id', __('Parent link'), array( 'class' => 'col-sm-2 control-label'));
		echo $this->Form->input('parent_id', array( 'label' => false , 'options' => $parentLinks, 'empty' => __('None'), 'class' => 'form-control', 'div' => array('class' => 'col-sm-2') ));		
	?>


</div> 


 <div class="form-group">


	<?php
		echo $this->Form->label('weight', __('Weight'), array( 'class' => 'col-sm-2 control-label'));
		echo $this->Form->input('weight', array( 'label' => false , 'default' => 0, 'class' => 'form-control', 'div' => array('class' => 'col-sm-2') ));		
	?>


</div> 




  </div>
  
  
    <div class="panel-footer">
    
      	<?php
		echo $this->Form->input('menu_id', array( 'type' => 'hidden', 'default' => $this->request->pass[0]));
		echo $this->Form->submit(__('Add New Link'), array( 'div' => false , 'class' => 'btn btn-primary' )); 
		
		?>
    
    
    </div>
  
  
</div>

<?php echo $this->Form->end(); ?>


</div>


</div>



