<?php //pr($questions); ?>
<?php echo $this->Form->create(); ?>
<div class="container">
	<p class="right"><?php if(isset($selfquiz) && !empty($courseid)) { ?>
		<a href="<?php echo $this->Html->url("/course-manage/edit-curriculum/".$courseid); ?>" class="button">Back to Course</a>
	<?php } ?></p>	
	<div class="quiz-cont">
	
	<h1>Quiz:<br/>
	<?php echo $quiz['CourseQuiz']['heading']; ?></h1>
	<span><?php echo $quiz['CourseQuiz']['content']; ?></span>
	<div class="quiz-qst-cont">
	<?php foreach($questions as $key=>$currquestion) { //pr($currquestion); ?>
		<?php if($currquestion['CourseQuizQuestion']['type'] == 'M' || $currquestion['CourseQuizQuestion']['type'] == 'B') { ?>
			<div class="q-box">
				<?php echo nl2br($this->Common->removetags($currquestion['CourseQuizQuestion']['question'])); ?>
			</div>
			<div class="options_box">
				<?php $opt = array(); foreach($currquestion['CourseQuizQuestionOption'] as $key1=>$val) { ?>
					<?php $opt[$val['id']] = $val['options']; ?>
				<?php } ?>
				<p class="options">
					<?php echo $this->Form->select("options.".$currquestion['CourseQuizQuestion']['id'],$opt,array('multiple' => 'checkbox',"div"=>false,"class"=>"chkoptionans")); ?>
				</p>
			</div>
		<?php } else { ?>
			<div class="q-box">
				<?php  $qst = $this->Common->getquestion($currquestion['CourseQuizQuestion']['question']); ?>
				<input type="hidden" name='data[options][<?php echo $currquestion['CourseQuizQuestion']['id']; ?>][ans]' id="fanswer" value="<?php echo base64_encode(strtolower(implode('',$qst['answer']))); ?>" >
				<?php  echo $qst['string']; ?>
			</div>
			<div class="options_box">
				<p class="options"><?php echo str_replace('_','',str_replace(" __ ","<input type='text' class='fill' name='data[options][".$currquestion['CourseQuizQuestion']['id']."][]' />",$qst['string'])); ?></p>
			</div>
		<?php } ?>
	<?php } ?>	
	</div>
	</div>
</div>
<?php echo $this->Form->submit("Submit"); ?>
<?php echo $this->Form->end(); ?>
