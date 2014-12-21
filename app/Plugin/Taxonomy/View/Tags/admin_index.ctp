<div class="terms index">


<?php echo $this->Form->create('Term', array('type' => 'get')); ?>


	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
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
    
    
			<th><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
			<th><?php echo  __('Slug'); ?></th>
			<th><?php echo  __('Description'); ?></th>
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
    
    
    
			<th><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
			<th><?php echo  __('Slug'); ?></th>
			<th><?php echo  __('Description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</tfoot>
    
    
    
	<tbody>
	<?php foreach ($terms as $term): ?>
	<tr>

        <td>
        
			<?php 
            
                echo $this->Form->input('cb' , array( 
                        'type' => 'checkbox' ,
                       'hiddenField' => false , 
                       'label' => false , 
                       'value' => $term['Term']['id'],
                       'name' => 'tags[]',
                       'class' => 'selectone',
                       'div' => false
                        ));
                        
             ?>
                    
        </td> 

		<td><?php echo h($term['Term']['name']); ?>&nbsp;</td>
		<td><?php echo h($term['Term']['slug']); ?>&nbsp;</td>
		<td><?php echo h($term['Term']['description']); ?>&nbsp;</td>
		<td class="actions">
        <ul class="list-inline">
			<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $term['Term']['id'])); ?></li>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $term['Term']['id']), array(), __('You are about to permanently delete the selected items.
  \'Cancel\' to stop, \'OK\' to delete.')); ?></li>
        </ul>    
            
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
    
    
  <?php echo $this->Form->end(); ?>  
    
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>