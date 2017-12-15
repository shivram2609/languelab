<div class="container">
<?php echo $this->element('coursesLeft');?>
<section class="right-panel">
	<h1>Grading Criteria</h1>
	<?php echo $this->Form->create('Course',array("enctype"=>"multipart/form-data","class"=>"profile_bx")); ?>
	<div class="intro-cont">
		<div class="row">
			<div class="category-box-text">
					<h2>Grading Criteria</h2>
			</div>
			
			<span class="lft">
				<?php echo $this->Form->input('grading',array('class'=>'controlChars','label'=>false, 'div'=>false,'type'=>"textarea")); ?>
			</span> 
			
		</div>
	</div>
	<p class="txt-center btn-padding">
		<?php echo $this->Form->submit("Save",array('label'=>false,'div'=>false,'class'=>'save-btn')); ?>
	</p>
	<?php echo $this->Form->end();?>
</section>
</div>
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<?php echo $this->Fck->loadlecturecontent("controlChars"); ?>  <!--here "controlChars" is the span input class that is mentioned above here-->
