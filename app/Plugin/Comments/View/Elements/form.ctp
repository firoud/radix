<div id="respond" class="comment-respond">


<h3 class="comment-reply-title" id="reply-title">
<?php echo __('Leave a Reply'); ?>

<small>
<?php echo $this->html->link(__('Cancel reply') , array('action' => 'view', $post_id ,  '#' => 'respond') , array( 'id' => 'cancel-comment-reply-link' , 'rel' => 'nofollow') ); ?>
</small>

</h3>

<?php echo $this->Form->create('Comment'); ?>


<?php if($loggedIn) : ?>

<p class="logged-in-as"><?php echo __('Logged in as'); ?> <?php echo $this->html->link($current_user['username'], array('plugin' => 'users', 'controller' => 'users', 'action' => 'admin_profile')); ?> . <?php echo $this->html->link(__('Log out?'), array('plugin' => 'users', 'controller' => 'users', 'action' => 'logout')); ?></p>


<?php 

		echo $this->Form->input('author', array('type' => 'hidden' , 'value' => $current_user['username']));
		echo $this->Form->input('author_url', array('type' => 'hidden' , 'value' => $current_user['url']));
		echo $this->Form->input('author_email', array('type' => 'hidden' , 'value' => $current_user['email']));
  		echo $this->Form->input('user_id' , array('type' => 'hidden' , 'value' => $current_user['id'] ));
  		echo $this->Form->input('approved' , array('type' => 'hidden' , 'value' => 'approved' ));


?>



<?php else :  ?>

<p class="comment-notes"><?php echo __('Your email address will not be published. Required fields are marked'); ?> <span class="required">*</span></p>


<div class="form-group">

<?php
  echo $this->Form->label('author', __('Name') . ' <span class="required">*</span>' , array( 'class' => 'form-label'));	
  echo $this->Form->input('author', array( 'label' => false, 'class' => 'form-control' , 'div' => false));
?>  

</div>




<div class="form-group">

<?php
  echo $this->Form->label('author_email', __('Email') . ' <span class="required">*</span>' , array( 'class' => 'form-label'));	
  echo $this->Form->input('author_email', array( 'label' => false, 'class' => 'form-control' , 'div' => false));
?>  

</div>



<div class="form-group">

<?php
  echo $this->Form->label('author_url', __('Website') , array( 'class' => 'form-label'));	
  echo $this->Form->input('author_url', array( 'label' => false, 'class' => 'form-control' , 'div' => false));
?>  

</div>



<?php 

  echo $this->Form->input('user_id' , array('type' => 'hidden' , 'value' => 0 ));
  echo $this->Form->input('approved' , array('type' => 'hidden' , 'value' => 'pending' ));
  
?>


<?php endif; ?>


<div class="form-group">

<?php
  echo $this->Form->label('content', __('Comment') . ' <span class="required">*</span>' , array( 'class' => 'form-label' ));	
  echo $this->Form->input('content', array( 'label' => false, 'rows' => 8 , 'class' => 'form-control' , 'div' => false));
?>  

</div>

<?php	
  echo $this->Form->input('parent_id' , array('type' => 'hidden' , 'value' => 0 ));
  echo $this->Form->input('post_id' , array('type' => 'hidden' , 'value' => $post_id ));
  echo $this->Form->input('agent' , array('type' => 'hidden' , 'value' => '' ));
?>
<?php echo $this->Form->submit(__('Post Comment'), array( 'class' => 'btn btn-primary' )); ?>
<?php echo $this->Form->end(); ?>
</div>

