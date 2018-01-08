<div class="container">
	
	
	<div class="quiz-cont">
	
	<h1>Assignment:</h1>
	<div class="quiz-qst-cont">
		
		<?php echo($data['CourseLectureAssignment']['assignment']); ?>
		
		
	</div>
	<a href ="<?php echo $this->Html->url("/assignment/".$lectureid."/".$courseid."/".$id);?>"><input type="button" value="Edit" id="edit"/></a>

	<a href="<?php echo $this->Html->url("/course-manage/edit-curriculum/".$courseid); ?>"><input type="button" value="Back" id="cancel"/></a>
	</div>
	
</div>
