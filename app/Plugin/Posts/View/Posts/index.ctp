<div class="posts index">
	<h2><?php echo __('Posts'); ?></h2>
<?php //debug($posts); ?>
    
<?php foreach ($posts as $post): ?>    
  
<article id="post-<?php echo h($post['Post']['id']); ?>" class="post-<?php echo h($post['Post']['id']); ?> <?php echo h($post['Post']['type']); ?> ">

<header class="entry-header">
<div class="entry-meta">
        <span class="cat-links">
        <?php 
		
		$list = array();
		
		foreach($post['Term'] as $term){
			
	if ($term['taxonomy'] == 'category'){
		$list[] = $this->html->link($term['name'], array('plugin' => 'taxonomy', 'controller' => 'categories',  'action' => 'view', $term['id'] )) ;
	}
			
			} 
			echo $this->text->toList($list);
			
			?>
       </span> 

</div>

<h2 class="entry-title">
<?php echo $this->html->link($post['Post']['title'], array('plugin' => 'posts', 'controller' => 'posts', 'action' => 'view', $post['Post']['id']  )); ?>
</h2>

<div class="entry-meta">
			<span class="entry-date">

<?php

echo $this->html->link('<time datetime="2014-12-06T17:37:17+00:00" class="entry-date">' . $post['Post']['created'] . '</time>', array(
												'plugin' => 'posts', 
												'controller' => 'posts', 
												'action' => 'view', 
												$post['Post']['id']
												),
												array('escape' => false, 'rel' => 'bookmark' )

);
  
?>

            
            
            </span> 
            
            <span class="byline">
            
            <span class="author vcard">
            <?php

echo $this->html->link($post['User']['username'], array(
												'plugin' => 'users', 
												'controller' => 'users', 
												'action' => 'view', 
												$post['User']['id']
												),
												array('escape' => false, 'rel' => 'author', 'class' => 'url fn n' )

);
  
?>
            
            </span>
            
            </span>	
            
            
            
            		
            <span class="comments-link">
            
           <?php if ($post['Post']['comment_status'] == 1) : ?>
            
            <a title="Comment on hi am abderrahman" href="http://localhost/wp4/?p=70#comments">1 Comment</a>
            
            <?php endif; ?>
            
            </span>
            
            <?php if ($loggedIn) : ?>
            <span class="edit-link"><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?></span>
            <?php endif; ?>
            
</div>




</header>


<div class="entry-content">
  <?php 
    
    if ($post['Post']['excerpt']){
    echo h($post['Post']['excerpt']);
    } else {
    echo $this->text->truncate($post['Post']['content'], 200, array( 'exact' => false));
    }
    
  
  ?>
</div>


<footer class="entry-meta">
    <span class="tag-links">
    
        <ul class="list-inline">
        
        <?php 
		
		foreach($post['Term'] as $term){
			
	if ($term['taxonomy'] == 'post_tag'){
		echo '<li>' . $this->html->link($term['name'], array('plugin' => 'taxonomy', 'controller' => 'tags',  'action' => 'view', $term['id'] )) . '</li>';
	}
			
			} 
			
	  ?>
      
       </ul> 


    
    </span>
</footer>


</article>  
    
    
<?php endforeach; ?>    
    
    


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

