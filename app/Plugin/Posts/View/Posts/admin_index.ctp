
<div class="posts index row">

<div class="col-md-12">

<?php echo $this->Form->create('Post', array('type' => 'get', 'class' => 'form-horizontal')); ?>


   <div class="form-group">
   <?php 
   
   $operations = array(	
      			'-1' => __('Bulk Actions'),			 				   
   				'delete' => __('Delete'),
   );
   
   echo $this->Form->input('operation', array( 'type' => 'select' ,'name' => 'operation' , 'label' => false ,'options' => $operations ,  'div' => false ,  'class' => 'form-control' )); ?>
   <?php echo $this->Form->submit(__('Apply') , array( 'div' => false , 'class' => 'btn btn-primary' )); ?>
   
   </div>


	<table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
    
	<thead>
	<tr>
    		<th>
            	
					<?php 
                    
                        echo $this->Form->input('select-all' , array( 
                               'type' => 'checkbox' ,
                               'hiddenField' => false , 
                               'label' => false , 
                               'name' => 'select-all-1',
							   'id' => 'selecctall',
                               'div' => false
                                ));
                                
                     ?>           
            
            </th>
    
    
			<th><?php echo $this->Paginator->sort('title', __('Title')); ?></th>
            <th><?php echo $this->Paginator->sort('user_id', __('Author')); ?></th>
			<th><?php echo __('Categories'); ?></th>
			<th><?php echo __('Tags'); ?></th>
			<th><?php echo $this->Paginator->sort('comment_count', '<i class="fa fa-comment"></i>', array( 'escape' => false)); ?></th>
			<th><?php echo $this->Paginator->sort('created', __('Date')); ?></th>            
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
    
	<tfoot>
	<tr>
    
    		<th>
            	
					<?php 
                    
                        echo $this->Form->input('select-all' , array( 
                               'type' => 'checkbox' ,
                               'hiddenField' => false , 
                               'label' => false , 
                               'name' => 'select-all-1',
							   'id' => 'selecctall',
                               'div' => false
                                ));
                                
                     ?>           
            
            </th>    
    
			<th><?php echo $this->Paginator->sort('title', __('Title')); ?></th>
            <th><?php echo $this->Paginator->sort('user_id', __('Author')); ?></th>
			<th><?php echo __('Categories'); ?></th>
			<th><?php echo __('Tags'); ?></th>
			<th><?php echo $this->Paginator->sort('comment_count', '<i class="fa fa-comment"></i>', array( 'escape' => false)); ?></th>
			<th><?php echo $this->Paginator->sort('created', __('Date')); ?></th>            
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</tfoot>    
    
    
    
    
	<tbody>
	<?php foreach ($posts as $post): ?>
	<tr>
    
 
 
    <td>
	
	<?php 
	
		echo $this->Form->input('cb' , array( 
	            'type' => 'checkbox' ,
	           'hiddenField' => false , 
			   'label' => false , 
			   'value' => $post['Post']['id'],
			   'name' => 'posts[]',
			   'class' => 'selectone',
			   'div' => false
			    ));
				
	 ?>
                
    </td> 
 
 
 
    
		<td>
		
        <strong>
		<?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'edit', $post['Post']['id'])); ?>        
        </strong>
        
        
        </td>
		<td>
			<?php echo $this->Html->link($post['User']['username'], array('plugin' => 'users', 'controller' => 'users', 'action' => 'edit', $post['User']['id'])); ?>
		</td>
        
        
		<td>
        <ul class="list-inline">
        <?php foreach($post['Term'] as $term){
			
	if ($term['taxonomy'] == 'category'){
		echo '<li>' . $this->html->link($term['name'], array('plugin' => 'taxonomy', 'controller' => 'categories',  'action' => 'edit', $term['id'] )) . '</li>';
	}
			
			} ?>
       </ul> 
        </td>
        
        
        
		<td>
        
        <ul class="list-inline">
        
        <?php 
		
		foreach($post['Term'] as $term){
			
	if ($term['taxonomy'] == 'post_tag'){
		echo '<li>' . $this->html->link($term['name'], array('plugin' => 'taxonomy', 'controller' => 'tags',  'action' => 'edit', $term['id'] )) . '</li>';
	}
			
			} 
			
	  ?>
      
       </ul> 
       
        </td>
        
        
        
		<td><?php echo h($post['Post']['comment_count']); ?></td>
		<td>
		
		<p><?php echo h($post['Post']['created']); ?></p>
        
        
        <p><?php switch($post['Post']['status']){
			
				case 'draft':
				echo __('Draft');
				break;
				case 'pending':
				echo __('Pending Review');
				break;				
				case 'publish':
				echo __('Published');
				break;				
			
			} ?></p>
        
        
        
        </td>

		<td class="actions">
        <ul class="list-inline">
			<li><?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?></li>
			<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?></li>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), array(), __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?></li>
        </ul>    
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
    
    
  <?php echo $this->Form->end(); ?>  
    
</div>    

</div>


<?php if ($this->Paginator->counter(array('format' => '{:pages}')) > 1) : ?>
<div class="row">


	<div class="col-md-6">
    
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	
    
    </div>
    
	<div class="col-md-6">
    
    <ul class="pagination">
	<?php
	    echo '<li>' . $this->Paginator->first('< first') . '</li>';
		echo '<li>' . $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')) . '</li><li>';
		echo $this->Paginator->numbers(array('separator' => '</li><li>'));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')) . '</li>';
	    echo '<li>' . $this->Paginator->last('last >') . '</li>';
	?>
    </ul>
    
	</div>
    
    
</div>
<?php endif; ?>

