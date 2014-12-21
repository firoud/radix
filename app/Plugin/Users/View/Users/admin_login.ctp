



<div class="panel panel-signin">
    <div class="panel-body">
        <div class="logo text-center">
        <?php echo $this->html->image('logo-primary.png' , array( 'alt' => '')); ?>
        </div>
        <br />
        <h4 class="text-center mb5">Already a Member?</h4>
        <p class="text-center">Sign in to your account</p>
        
        <div class="mb30"></div>

<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create('User'); ?>


              <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <?php echo $this->Form->input('username', array('label' =>  false, 'class' => 'form-control', 'placeholder' => __('Username')));?>
               </div><!-- input-group -->
               

              <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <?php echo $this->Form->input('password', array('label' =>  false, 'class' => 'form-control', 'placeholder' => __('Password')));?>
               </div><!-- input-group -->  
               
               
               
                         <div class="clearfix">
                            <div class="pull-left">
                                <div class="ckbox ckbox-primary mt10">
                                
                    <?php echo $this->Form->input('rememberMe', array('type' => 'checkbox', 'label' =>  false, 'value' => 1, 'div' => false ));?>
                    <?php echo $this->Form->label('rememberMe', __('Remember Me'));?>
                                

                                </div>
                            </div>
                            <div class="pull-right">
                            <?php echo $this->Form->button(__('Sign In') . ' <i class="fa fa-angle-right ml5"></i>' , array('type' => 'submit', 'div' => false,  'class' => 'btn btn-success')); ?>
                            </div>
                        </div>                
                            


<?php echo $this->Form->end(); ?>



                </div><!-- panel-body -->
                <div class="panel-footer">
                     <?php echo $this->html->link(__('Not yet a Member? Create Account Now'), '' , array( 'class' => 'btn btn-primary btn-block' ));?>

                </div><!-- panel-footer -->
            </div><!-- panel -->
