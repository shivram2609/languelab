<?php echo $this->Html->script('jquery.form'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		var i= 0;
		$("#CourseAddquestionsForm").ajaxForm({
			beforeSubmit: function(){
				var i = 0;
				$("#questionerr").html("");
				$("#questionerr").hide();
				if($(".addquestionnew").html() && $("#CourseQuizQuestionType").val() !="F") {
					$(".optquestionval").each(function(e){
						if($(this).val().length == 0) {
							i +=1;
						}
					});
					if($("#CourseQuizQuestionQuestion").val().length == 0) {
						i++;
						$("#questionerr").html("Please enter question");
						$("#questionerr").show();
						setTimeout('$("#questionerr").hide();',2000);
						return false;
					}
					if (i >= 4) {
						$("#questionerr").html("Please enter options");
						$("#questionerr").show();
						setTimeout('$("#questionerr").hide();',2000);
						return false;
					}
					if ($(".optquestion:checked").length == 0) {
						i++;
						$("#questionerr").html("Please select one answer");
						$("#questionerr").show();
						setTimeout('$("#questionerr").hide();',2000);
						return false;
					} 
				} else if ($(".addquestionnew").html() && $("#CourseQuizQuestionType").val() =="F") {
					if($("#CourseQuizQuestionQuestion").val().length == 0) {
						i++;
						$("#questionerr").html("Please enter question");
						$("#questionerr").show();
						setTimeout('$("#questionerr").hide();',2000);
						return false;
					}
				}
			},
			success: function(response) { // do some ui update .. 
				if(parseInt(response) == 1) {
					$("#questionerr").html("The question has beeen uploaded.");
					$("#questionerr").attr("style","color:green;");
					$("#questionerr").show();
					setTimeout('$("#questionerr").hide();',2000);
					setTimeout('$(".addquestionnew").slideUp("slow");',1000);
					refreshcurriculum();
				} else if (parseInt(response) == 2) { 
					$("#questionerr").html("The question must contain two (_) before and after answer.");
					$("#questionerr").attr("style","color:red;");
					$("#questionerr").show();
					setTimeout('$("#questionerr").hide();',2000);
				}else if(i == 0){
					$("#questionerr").html("The question can not be uploaded, please try again.");
					$("#questionerr").attr("style","color:red;");
					$("#questionerr").show();
					setTimeout('$("#questionerr").hide();',2000);
				}
			}
		});
		$(".optquestion").live("click",function(){
			$(".optquestion").removeAttr("checked");
			$(this).attr("checked","checked");
		});
		/*$("#CourseAddquestionsForm").submit(function(e) {
			i = 0;
			$("#questionerr").html("");
			$("#questionerr").hide();
			if($(".addquestionnew").html() && $("#CourseQuizQuestionType").val() !="F") {
				$(".optquestionval").each(function(e){
					if($(this).val().length == 0) {
						i +=1;
					}
				});
				if($("#CourseQuizQuestionQuestion").val().length == 0) {
					i++;
					$("#questionerr").html("Please enter question");
					$("#questionerr").show();
					setTimeout('$("#questionerr").hide();',2000);
					e.preventDefault();
					return false;
				}
				if (i >= 4) {
					$("#questionerr").html("Please enter options");
					$("#questionerr").show();
					setTimeout('$("#questionerr").hide();',2000);
					e.preventDefault();
					return false;
				}
				if ($(".optquestion:checked").length == 0) {
					i++;
					$("#questionerr").html("Please select one answer");
					$("#questionerr").show();
					setTimeout('$("#questionerr").hide();',2000);
					e.preventDefault();
					return false;
				} 
			}
		});*/
	});
</script>
<div class = "quizformcontainer quizextra_<?php echo $id ?>" >
<?php //pr($data); ?>
<?php echo $this->Form->create("Course",array("action"=>"addquestions"),array("id"=>"courseid")); ?>
<?php echo $this->Form->hidden("CourseQuiz.id",array("value"=>$id)); ?>
<?php if(isset($quizdesc)) { ?>
<?php echo $this->Form->input("CourseQuiz.heading",array("type"=>"text","label"=>"Quiz Heading","class"=>"coursequizdesc","value"=>$course['CourseQuiz']['heading'])); ?>
<?php echo $this->Form->input("CourseQuiz.content",array("type"=>"textarea","label"=>"Quiz Description","class"=>"coursequizdesc","value"=>$course['CourseQuiz']['content'])); ?>
<?php echo $this->Form->submit("Submit",array("id"=>"addquizbtn","label"=>false,"div"=>false)); ?>
<?php } else { ?>
<ul style="width:100%;float:left;margin:20px 0;" id="qstoption_<?php echo $id; ?>">
	<li style="width:30%;float:left;"><a href="<?php echo SITE_LINK."addquizquestion/".$id."/m"; ?>" class="createquestion_" id="mul_<?php echo $id ?>" target="_blank">Multiple Choice</a></li>
	<li style="width:30%;float:left;"><a href="<?php echo SITE_LINK."addquizquestion/".$id."/t"; ?>" class="createquestion_" id="truefalse_<?php echo $id ?>" target="_blank">True/False</a></li>
	<li style="width:30%;float:left;"><a href="<?php echo SITE_LINK."addquizquestion/".$id."/f"; ?>" class="createquestion_" id="fill_<?php echo $id ?>" target="_blank">Fill in the Blanks</a></li>
	<li style="width:30%;float:left;"><a href="<?php echo SITE_LINK."addquizquestion/".$id."/a"; ?>" class="createquestion_" id="audio_<?php echo $id ?>" target="_blank">Audio</a></li>
	<li style="width:30%;float:left;"><a href="<?php echo SITE_LINK."addquizquestion/".$id."/v"; ?>" class="createquestion_" id="video_<?php echo $id ?>" target="_blank">Video</a></li>
	<li style="width:30%;float:left;"><a href="<?php echo SITE_LINK."addquizquestion/".$id."/d"; ?>" class="createquestion_" id="docs_<?php echo $id ?>" target="_blank">Documents</a></li>
	<li style="width:30%;float:left;"><a href="<?php echo SITE_LINK."addquizquestion/".$id."/match"; ?>" class="createquestion_" id="match_<?php echo $id ?>" target="_blank">Match columns</a></li>
	
	
</ul>
<?php } ?>
<?php echo $this->Form->end(); ?>
</div>

