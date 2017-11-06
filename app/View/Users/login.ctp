<style>
#wrapper{min-width:0px;min-height:0px;}
</style>
 <div class="login-box">
 <div class="box-shadow">
 <h3>Sign into your account </h3>
 <?php echo $this->Form->create('User'); ?>
 <?php echo $this->Session->flash(); ?>
		<?php echo $this->Form->input("username",array("div"=>true,"type"=>"text","label"=>false,"placeholder"=>"Email")); ?>
		<?php echo $this->Form->input('password',array("label"=>'Password',"type"=>'password',"div"=>true,"label"=>false,"placeholder"=>"Password")); ?>
		<div class="clear-fix"></div>
		<div class="keep-me"><?php echo $this->Form->input('remember_me', array('type' => 'checkbox','checked'=>false, 'label'=>'Keep me logged in','div'=>false)); ?></div>
		<div class="forgot-password"><a href="<?php echo $this->Html->url("/forgotpassword"); ?>" title="Forgot  your password?">Forgot your password?</a></div>
		<div class="clear-fix"></div>
		<?php echo $this->Form->submit("Login",array("class"=>"login-btn ","div"=>false,"label"=>false)) ?>
		<p class="sign-up">Don't have an account yet? <a href="<?php echo $this->Html->url("/signup"); ?>" title="Sign in">Signup</a></p>
		</div>
		
		
<?php echo $this->Form->end(); ?>
 </div> 

