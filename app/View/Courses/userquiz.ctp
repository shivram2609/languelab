<div class="container">
<?php //pr($quizData);die;//here this $coursequizs is the variable that is used from the function quizwork which is present in the CourseController 
?>

<section class="right-panel">
	<h1>INTRODUCTION TO QUIZ</h1>
	
	<div class="quiz_intro-cont">
		
			<div class="heading_box-text">
					<h2><em>&nbsp;</em>Quiz Heading</h2>
					<em>&nbsp;</em>
					<?php echo $quizData['CourseQuiz']['heading']; ?>
			</div>
			<em>&nbsp;</em>
			<div class="content_box_text">
		            <h2><em>&nbsp;</em>Quiz Content</h2>
		            <em>&nbsp;</em>
					<?php echo $quizData['CourseQuiz']['content']; ?>
	        </div>
				<em>&nbsp;</em>
	</div>
	
	<a href="<?php echo $this->Html->url("/userquiz/".$quizData['CourseQuiz']['id']."/a"); ?>"><input type="button" value="Start Quiz" id="takequiz"/></a>
	<em>&nbsp;</em>
	<a ><input type="button" value="Cancel" id="cancel" onclick="goBack()"/></a>
	
</section>

</div>

<script>
function goBack() {
    window.history.back()
}
</script>
