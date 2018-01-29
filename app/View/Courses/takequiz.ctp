<div class="container">
	<?php //pr($data); die;?>
	<?php echo $this->Form->create("UserCourseQuizQuestion"); ?>
	<?php echo $this->Form->hidden("UserCourseQuizQuestion.id",array("value"=>$data['UserCourseQuizQuestion']['id'])); ?>
	<?php echo $this->Form->hidden("UserCourseQuizQuestion.type",array("value"=>$data['UserCourseQuizQuestion']['type'])); ?>
	
		<?php echo $this->Session->flash(); ?>
			<div class="review-list">
				<div class="quiz-cont">
				<h1><em>&nbsp;</em>Quiz  </h1>
						<h2>Qusetion</h2>
					<?php if ($data['UserCourseQuizQuestion']['type'] == 'A') { ?>
						<div class="q-box">
							<?php echo $data['UserCourseQuizQuestion']['question']; ?>
							<?php //echo nl2br($this->Common->removetags($data['UserCourseQuizQuestion']['question'])); ?>
						</div>
						<h2><em>&nbsp;</em>Audio</h2>
							<div class="box">
								<audio id="audiio" width="320" height="240" controls>	
								  <source src="<?php echo SITE_LINK.$data['UserCourseQuizQuestion']['media']; ?>" type="audio/mp3">
								  <source src="<?php echo SITE_LINK.$data['UserCourseQuizQuestion']['media'].".ogg"; ?>" type="audio/ogg">
								  Your browser does not support the audio tag.
								</audio>
							</div>
				<h2><em>&nbsp;</em>Answer</h2>
					<div class="answer-cont">
						<?php echo $this->Form->input("answer",array("type"=>"textarea","label"=>false,"div"=>false,"cols"=>"60"));  ?>
					</div>
						<em>&nbsp;</em>
					<?php } elseif ($data['UserCourseQuizQuestion']['type'] == 'V') {?>
						<div class="q-box">
							<?php echo $data['UserCourseQuizQuestion']['question']; ?>
						</div>
						<h2><em>&nbsp;</em>Video</h2>
							<div class="box">
								<video id="vid" width="320" height="240" controls>
								  <source src="<?php echo SITE_LINK.$data['UserCourseQuizQuestion']['media'];?>" type="video/mp4">
								  <source src="<?php echo SITE_LINK.$data['UserCourseQuizQuestion']['media'].".webm";?>" type="video/webm">
								  Your browser does not support the video tag.
								</video>
							</div>
				<h2><em>&nbsp;</em>Answer</h2>
					<div class="answer-cont">
						<?php echo $this->Form->input("answer",array("type"=>"textarea","label"=>false,"div"=>false,"cols"=>"60"));  ?>
					</div>
						<em>&nbsp;</em>
					<?php } elseif($data['UserCourseQuizQuestion']['type'] == 'M' ) {	?>
						<div class="q-box">
							<?php echo $data['UserCourseQuizQuestion']['question']; ?>
						</div>
							<div class="options_box">
								<?php foreach($data['UserCourseQuizQuestionOption'] as $key=>$val) { ?>
									<p class="options">
										<input type="checkbox" name="data[UserCourseQuizQuestionOption][<?php echo $val['id']; ?>]" value="<?php echo $val['id']; ?>" id="val_<?php echo $val['id']; ?>"  /><?php echo $val['options']; ?>
									</p>
								<?php }  ?>
							</div>
					<?php } elseif($data['UserCourseQuizQuestion']['type'] == 'F' ) { ?>
						<div class="q-box">
							<?php  $qst = $this->Common->getquestion($data['UserCourseQuizQuestion']['question']); ?>
								<input type="hidden" id="fanswer"  value="<?php echo implode('',$qst['answer']); ?>" >
								<?php  echo $qst['string']; ?>
						</div>
							<div class="options_box">
								<p class="options">
									<?php echo str_replace('_','',str_replace(" __ ","<input type='text' name='data[UserCourseQuizQuestion][answer]' class='fill' style='width: 30%;'/>",$qst['string'])); ?>
								</p>
							</div>
					<?php } elseif($data['UserCourseQuizQuestion']['type'] == 'T' ) { ?>
						<div class="q-box">
								<?php echo $data['UserCourseQuizQuestion']['question']; ?>
						</div>
							<div class="options_box">
								<?php foreach($data['UserCourseQuizQuestionOption'] as $key=>$val) { ?>
									<p class="options">
										<input type="radio" name="data[UserCourseQuizQuestionOption][<?php echo $val['id']; ?>]" value="<?php echo $val['id']; ?>"  class="chkoptionans" /><?php echo $val['options']; ?>
									</p>	
								<?php } ?>
						</div>
					<?php } elseif($data['UserCourseQuizQuestion']['type'] == 'MATCH' ) { ?>	
						<div class="q-box">
								<?php echo $data['UserCourseQuizQuestion']['question']; ?>
						</div>
							<div class="options_box">
								<div style="float:left;width:50%">
									<?php foreach($data['UserCourseQuizQuestionOption'] as $key=>$val) { ?>
										<input type="hidden" id="match"  value="<?php echo $val['id']; ?>" >
										<p class="options">
											<input type="checkbox" name="data[UserCourseQuizQuestionOption][<?php echo $val['id']; ?>]" value="<?php echo $val['id']; ?>" class="manswer" /><?php echo $val['options'] ?>
											<input type="hidden" name="data[UserCourseQuizQuestionOption][<?php echo $val['id']; ?>][user_answer]" id="<?php echo $val['id']; ?>" />
										</p>
									<?php } ?>
								</div>
								<div style="float:left;width:50%">
									<?php foreach($data1 as $key1=>$val1) { ?>
										
										<p class="options">
											<input type="checkbox" name="data[UserCourseQuizQuestionOption][<?php echo $val1['UserCourseQuizQuestionOption']['id']; ?>]" value="<?php echo $val1['UserCourseQuizQuestionOption']['id']; ?>" class="manswer1" id="manswer1" disabled/><?php echo $val1['UserCourseQuizQuestionOption']['opt_answer']; ?>
										</p>
									<?php } ?>
								</div>
							</div>
					<?php } elseif($data['UserCourseQuizQuestion']['type'] == 'D' ) { ?>	
						<div class="q-box">
							<?php echo $data['UserCourseQuizQuestion']['question']; ?>
						</div>
						<h2><em>&nbsp;</em>Document</h2>
							<div class="box">
								<iframe src="http://docs.google.com/gview?url=<?php echo SITE_LINK.$data['UserCourseQuizQuestion']['media']; ?>&embedded=true" style="width:100%; height:530px;" frameborder="0" id="viewer_frame">
								</iframe>
							</div>
					<h2><em>&nbsp;</em>Answer</h2>
					<div class="answer-cont">
						<?php echo $this->Form->input("answer",array("type"=>"textarea","label"=>false,"div"=>false,"cols"=>"60"));  ?>
					</div>
						<em>&nbsp;</em>
					<?php } ?>	
					<em>&nbsp;</em>
					<div class="submit">
					<?php echo $this->Form->submit("Submit",array("class"=>"button")); ?>
					
					</div>
				</div>
			</div>
		<div class="bdr-top clear-fix"></div>	
	<?php echo $this->Form->end(); ?>
</div>
<script type="text/javascript">
	
	
	$(document).ready(function(){
		var checkedId = '';
		$('.manswer').click(function(e){
			checkedId = $(this).val();
			$('.manswer1').prop('disabled', false);
			$('.manswer').prop('disabled', true);
		});
		$('.manswer1').click(function(){
				if ($('.manswer1').is(":checked")) {
					$("#"+checkedId).val($(this).val());
					 //alert( " Value: " + $(this).val());
				} 
				$('.manswer').prop('disabled', false);
				$('.manswer1').prop('disabled', true);
			
		});
	});
</script>

