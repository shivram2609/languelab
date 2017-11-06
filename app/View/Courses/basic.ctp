<div class="container">
<?php echo $this->element('coursesLeft');?>
<section class="right-panel">
	<h1>Introduction</h1>
	<?php echo $this->Form->create('Course',array("enctype"=>"multipart/form-data","class"=>"profile_bx")); ?>
	<div class="intro-cont">
		<div class="row">
		<div class="category-box-text">
				<h2>Title</h2>
		</div>
			
			<span class="lft">
				<?php echo $this->Form->input('title',array('class'=>'controlChars','label'=>false, 'div'=>false,'maxlength'=>51)); ?>
				<span class="counter"></span>
			</span> 
			
		</div>
		<div class="row">
			<div class="category-box-text">
			<br><h2>Sub Title</h2><br><br>
			</div>
			<span class="lft">
				<?php echo $this->Form->input('subtitle', array('class'=>'controlChars','rows'=>2,'type'=>'textarea','label'=>false, 'div'=>false,'placeholder'=>"e.g. Intro course to novice",'maxlength'=>120)); ?>
				<span class="counter"></span>
			</span>
			<?php /*<span class="rt">
				<a href="javascript:void(0);" id="subtitleQue" title="Help"><img src="<?php echo $this->webroot; ?>img/question.png" width="38" height="38" alt="Help" /></a>
			</span><?php */ ?>
		</div>	
		
		<div class="row">
			<div class="category-box-text">
				<h2>Keywords</h2>
			</div>
			<span class="lft">
			<?php echo $this->Form->input('keywords', array('label'=>false, 'div'=>false,'class'=>'controlChars','maxlength'=>100)); ?>
			<span class="counter"></span>
			</span>
		</div>
		<div class="row">
		<div class="category-box-text">
				<h2>Category / Language</h2>
			</div>
			<span class="rt">
				Category<br />
				<?php //echo $this->Form->input('category_id',array("id"=>"country-options","div"=>false,"label"=>false,"multiple"=>true,"empty"=>"Select Category","style"=>"height:80px;","selected"=>explode(",",$this->data['Course']['category_id']))); ?>
				<?php echo $this->Form->input('category_id',array("id"=>"country-options","div"=>false,"label"=>false,"empty"=>"Select Category","value"=>$this->data['Course']['category_id'])); ?>
			</span>
			<span class="rt">
				Language<br>
				<?php echo $this->Form->input('language_id',array("id"=>"language-options","div"=>false,"label"=>false, "empty"=>"Select Language")); ?>
			</span>
		</div>
	</div>
	<p class="txt-center btn-padding">
		<?php echo $this->Form->submit("Save",array('label'=>false,'div'=>false,'class'=>'save-btn')); ?>
	</p>
	<?php echo $this->Form->end();?>
</section>
</div>
