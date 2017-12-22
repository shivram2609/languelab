<div class="container">
<?php //pr($coursequizs);//here this $coursequizs is the variable that is used from the function quizwork which is present in the CourseController 
?>

<section class="right-panel">
	<h1>INTRODUCTION TO QUIZ</h1>
	
	<div class="quiz_intro-cont">
		
			<div class="heading_box-text">
					<h2>Quiz Heading</h2>
					<?php echo $coursequizs['CourseQuiz']['heading']; ?>
			</div>
			<div class="content_box_text">
		            <h2>Quiz Content</h2>
					<?php echo $coursequizs['CourseQuiz']['content']; ?>
	        </div>
	
	</div>
	
	<a href="<?php echo $this->Html->url("/startquiz/".$coursequizs['CourseQuiz']['id']."/"); ?>"><input type="button" value="Start Quiz" id="startquiz"/></a>
</section>

</div>

