
<div class="container">
	<?php //pr($listquiz);//here this $coursequizs is the variable that is used from the function quizwork which is present in the CourseController 
?>

<section class="right-panel">
	<h2>ASSIGNMENT</h2>
	
	<?php echo $this->Form->create('CourseLectureAssignment',array("enctype"=>"multipart/form-data","class"=>"profile_bx")); ?>
	<div class="intro-cont">
		<div class="row">
			<div class="category-box-text">
					<h2>ASSIGNMENT</h2>
			</div>
			
			<span class="lft">
				<?php echo $this->Form->input('assignment',array('class'=>'controlAssign','label'=>false, 'div'=>false,'type'=>"textarea")); ?>
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
<?php echo $this->Fck->loadlecturecontent("controlAssign"); ?>  <!--here "controlAssign" is the span input class that is mentioned above here-->
