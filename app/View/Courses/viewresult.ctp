<div class="container">
	<div class="quiz-cont">
		<h1>Quiz Result</h1>
	<div class="q-box">
		Following are the details for the quiz.
	</div>
	<p class="options">Total Questions	: <?php echo $total; ?></p>
	<p class="options">Correct Answers	: <?php echo $correct; ?></p>
	<p class="options">Percentage		: <?php echo $percentage; ?></p>
	<p class="right"><a href="<?php echo $this->Html->url("/view-courses"); ?>" class="button">View Courses</a></p>
	<p class="right" style="float:left;"><a href="<?php echo $this->Html->url("/q/".$quizid); ?>" class="button">Reappear for Quiz</a></p>
	<br/>
		<p class="clear-fix"></p>
		<?php /*
		<div class="bdr-fram">
			<div class="rw">
				<p class="qstn options">Questions</p>
				<p class="ansr">You Answers</p>
			</div>
			<?php foreach($_SESSION["answerquiz"][$quizid] as $key=>$val) {  ?>
				<?php if(!empty($val['displayquestion'])) { ?>
				<div class="rw">
					<p class="qstn options">
						<?php if(empty($val["question"])) { echo $val["displayquestion"]; } else { $qst = $this->Common->getquestion($val["displayquestion"]); echo $qst['string']; } ?>
					</p>
						<?php if(empty($val['answerflag'])) { ?>
							<p class="ansr" style="color:red;"><?php echo rtrim($val["rawanswer"],","); ?></p>
						<?php } else { ?>
							<p class="ansr" style="color:green;"><?php echo rtrim($val["rawanswer"],","); ?></p>
						<?php } ?>
				</div>
				<?php } ?>
			<?php } ?>
		</div> */ ?>
	</div>
</div>
