<?php //pr($quiz); 
//pr($data);
//die;?>
<?php echo $this->Form->create(); ?>
	<div class="container">
		<div class="quiz-cont">
			<h1>Quiz:<br/>
			<?php echo $quiz['UserCourseQuiz']['heading']; ?></h1>
			<span><?php echo $quiz['UserCourseQuiz']['content']; ?></span>
			<div class="quiz-qst-cont">
				<em>&nbsp;</em>
				<?php foreach($data as $key=>$currquestion) { //pr($currquestion); die;?>
					<?php if($currquestion['UserCourseQuizQuestion']['type'] == 'MATCH')  { ?>
						<div class="q-box">
							<div class=qst><?php echo "Question"; ?></div>
								<?php foreach($currquestion['UserCourseQuizQuestionOption'] as $key1=>$val1) { $optAns[$val1['id']] = $val1['opt_answer']; ?>
								<?php } ?>
								<?php foreach($currquestion['UserCourseQuizQuestionOption'] as $key=>$val) { //pr($val); die; ?>
									<div class="qstnew" style="float:left;width:50%">
										<p class="options" >
										<?php echo $val['options']; ?>
										</p>
									</div>
									<div class="ansnew" style="float:left;width:50%">
										<p class="ans">
										<?php echo $optAns[$val['user_answer']]; ?>
										</p>
									</div>
								<?php }  ?>
						</div>
					<?php } elseif ($currquestion['UserCourseQuizQuestion']['type'] == 'M' || $currquestion['UserCourseQuizQuestion']['type'] == 'T' ) {  ?>
						<div class="q-box">
							<div class=qst><?php echo "Question"; ?></div>
								<?php echo $currquestion['UserCourseQuizQuestion']['question']; ?>
								<?php $qstStr = $ansStr = ""; ?>
								<?php foreach($currquestion['UserCourseQuizQuestionOption'] as $key=>$val) { //pr($val); die; ?>
									<?php $qstStr .='<p class="options" >'; ?>
									<?php $qstStr.=$val['options']."</p>"; ?>
									<?php $ansStr .='<p class="ans">'; ?>
									<?php $ansStr .= (empty($val['user_answer'])?'&nbsp;':'Your Answer'); ?>
									<?php $ansStr .="</p>"; ?>
								<?php }  ?>
								<div class="qstnew"><?php echo $qstStr; ?></div>
								<div class="ansnew"><?php echo $ansStr; ?></div>
						</div>
					<?php } else {  ?>
						<div class="q-box">
						<div class=qst><?php echo "Question"; ?></div>
							<?php $qst = $this->Common->getquestion($currquestion['UserCourseQuizQuestion']['question']); ?>
								<input type="hidden" name='data[options][<?php echo $currquestion['UserCourseQuizQuestion']['id']; ?>][ans]' id="fanswer" value="<?php echo base64_encode(strtolower(implode('',$qst['answer']))); ?>" >
								<?php  echo $qst['string']; ?>
							<?php if ($currquestion['UserCourseQuizQuestion']['type'] == 'A'){?>
								<h2><em>&nbsp;</em>Audio</h2>
								<div class="box">
									<audio id="audio" width="320" height="240" controls >	
									<source src="<?php echo SITE_LINK.$currquestion['UserCourseQuizQuestion']['media']; ?>" type="audio/mp3">
									<source src="<?php echo SITE_LINK.$currquestion['UserCourseQuizQuestion']['media'].".ogg"; ?>" type="audio/ogg">
									Your browser does not support the audio tag.
									</audio>
								</div>
							<?php } elseif ($currquestion['UserCourseQuizQuestion']['type'] == 'V') { ?>
								<h2><em>&nbsp;</em>Video</h2>
								<div class="box">
									<video id="vid" width="320" height="240" controls>
									<source src="<?php echo SITE_LINK.$currquestion['UserCourseQuizQuestion']['media'];?>" type="video/mp4">
									<source src="<?php echo SITE_LINK.$currquestion['UserCourseQuizQuestion']['media'].".webm";?>" type="video/webm">
									Your browser does not support the video tag.
									</video>
								</div>
							<?php } elseif ($currquestion['UserCourseQuizQuestion']['type'] == 'D') { ?></br>
								<h2><em>&nbsp;</em>Document</h2>
								<div class="box">
									<iframe src="http://docs.google.com/gview?url=<?php echo SITE_LINK.$currquestion['UserCourseQuizQuestion']['media']; ?>&embedded=true" style="width:100%; height:530px;" frameborder="0" id="viewer_frame">
									</iframe>
								</div>
							<?php } ?></br>
							<?php echo "Your Answer"?>
							<div class="ansnew">
								<p class="ans">
								<?php echo $currquestion['UserCourseQuizQuestion']['answer']; ?>
								</p>
							</div>	
						</div>
					<?php }  ?>
				<?php }  ?>	
			</div>
		</div>
	</div>
	
	<?php echo $this->Form->end(); ?>
	
