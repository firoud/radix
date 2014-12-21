<?php 
$this->Html->addCrumb(__('Menus'), array('plugin' => 'menus' , 'controller' => 'menus' , 'action' => 'admin_index'));
$this->Html->addCrumb(__('Add menu'), NULL);
?>

<div class="row">

<div class="col-md-12 menus form">




<?php echo $this->Form->create('Menu', array( 'class' => 'form-horizontal' )); ?>

<div class="panel panel-default">

  <div class="panel-heading">
    <h3 class="panel-title"><?php echo __('Create New Menu'); ?></h3>
  </div>

<div class="panel-body">



<div class="form-group">


	<?php
		echo $this->Form->label('title', __('Name') . ' <span title="'. __('This field is required.') . '" class="form-required">*</span>', array( 'class' => 'col-sm-2 label-control'));
		echo $this->Form->input('title', array( 'label' => false , 'class' => 'form-control', 'div' => array('class' => 'col-sm-6') ));		
	?>


</div>

<div class="form-group">


	<?php
		echo $this->Form->label('menu_name', __('Slug') . ' <span title="'. __('This field is required.') . '" class="form-required">*</span>', array( 'class' => 'col-sm-2 label-control'));
		echo $this->Form->input('menu_name', array( 'label' => false , 'class' => 'form-control', 'div' => array('class' => 'col-sm-6') , 'after' => '<div class="help-block">'  . __('A unique name to construct the URL for the menu. It must only contain lowercase letters, numbers and hyphens.') . '</div>' ));		
	?>
   </div> 


<div class="form-group">


	<?php
		echo $this->Form->label('description', __('Description'), array( 'class' => 'col-sm-2 label-control'));
		echo $this->Form->input('description', array( 'label' => false , 'class' => 'form-control', 'div' => array('class' => 'col-sm-10')));		
	?>
  
    
</div>


 </div>
 
    <div class="panel-footer">
	<?php
		echo $this->Form->submit(__('Create Menu'), array('class' => 'btn btn-primary'));
	?>
     </div>
     
     
	

</div>


<?php echo $this->Form->end(); ?>


</div>

</div><!-- /.row -->
