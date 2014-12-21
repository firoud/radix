<div class="row">
<?php echo $this->Form->create('Post'); ?>

<div class="col-md-8">

<div class="form-group">
<?php echo $this->Form->input('title', array( 'type' => 'text', 
                                              'label' => false, 
											  'placeholder' => __('Enter title here') ,
											  'class' => 'form-control input-lg'
											   )); ?>
</div>


<div class="panel panel-default">
  <div class="panel-body">
<?php echo $this->Form->input('content', array( 'type' => 'textarea', 
                                              'label' => false,
											  'rows' => 10, 											   
											  'class' => 'form-control'
											   )); ?>
  </div>
</div>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo __('Excerpt'); ?></h3>
  </div>
  <div class="panel-body">

<?php echo $this->Form->input('excerpt', array( 'type' => 'textarea', 
                                              'label' => false,
											  'rows' => 3, 
											  'class' => 'form-control'
											  
											   )); ?>
                                               
                                               
 <div class="help-block"><?php echo __('Excerpts are optional hand-crafted summaries of your content that can be used in your theme.'); ?></div>                                               

  </div>
</div>






<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo __('Slug'); ?></h3>
  </div>
  <div class="panel-body">
    <?php echo $this->Form->input('slug', array( 'type' => 'text', 'label' => false , 'class' => 'form-control')); ?>
  </div>
</div>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo __('Discussion'); ?></h3>
  </div>
  <div class="panel-body">
    <?php echo $this->Form->input('comment_status', array('label' => __('Allow comments.'), 'default' => 1)); ?>
  </div>
</div>


	

 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo __('Featured Image'); ?></h3>
  </div>
  <div class="panel-body">
    <?php echo $this->html->link('Set featured image', '#' , array( 'id' => 'imageUpload' )); ?>
  </div>
</div>

   
    
    

    
    
</div>  




    <div class="col-md-4">
    
        
     <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo __('Publish'); ?></h3>
      </div>
      <div class="panel-body bordered">

	      <?php echo $this->Form->input('type', array('type' => 'hidden' , 'value' => 'post'));?>
    
          <div class="form-group">
        <?php echo $this->Form->label('status', __('Status'), array('class' => 'label-control')); ?>  
        <?php echo $this->Form->input('status',array( 'label' => false , 'type' => 'select' , 'class' => 'form-control',  'options' => array('publish' => __('Published'),  'pending' => __('Pending Review') ,  'draft' => __('Draft') ) )); ?>
        </div>   
        
        
         <div class="form-group"> 
      <?php echo $this->Form->input('sticky', array('label' => __('Make this post sticky'), 'default' => 0)); ?>
		</div> 
        
    
         <div class="form-group">
         <?php echo $this->Form->label('created', __('Date'),  array( 'label' => 'form-control'  )); ?> 
        <?php echo $this->Form->input('created',  array( 'label' => false , 'class' => 'form-control'  )); ?>
        </div>   
    



      </div>
      
     <div class="panel-footer"><?php echo $this->Form->submit(__('Publish') , array('class' => 'btn btn-primary  pull-right')); ?></div> 
      
      
    </div>   
        



<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo __('Author'); ?></h3>
  </div>
  <div class="panel-body">
    <?php echo $this->Form->input('user_id', array( 'label' => false , 'options' => $users, 'default' => $current_user['id'], 'id' => 'select-basic',  'class' => 'form-control')); ?>
  </div>
</div>

 

     <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo __('Categories'); ?></h3>
      </div>
      <div class="panel-body">
          		<?php echo $this->Form->input('Term', array('multiple' => 'checkbox', 'label' => false , 'div' => false)); ?>
      </div>
    </div> 
 
        
     <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo __('Tags'); ?></h3>
      </div>
      <div class="panel-body">
          <?php echo $this->Form->input('tags', array( 'label' => false , 'class' => 'form-control', 'id' => 'tags')); ?>
          
         <div class="help-block">
         <?php echo __('Separate tags with commas'); ?>
         </div>                                               
          
      </div>
    </div>  
        
    
    </div>



  
    
<?php echo $this->Form->end(); ?>






</div>

