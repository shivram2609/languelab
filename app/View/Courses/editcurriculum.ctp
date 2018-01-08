<?php //pr($coursequestions); die;// to get details of all the course_quiz?>
<?php //pr($quizlecture ); die; ?>


<?php echo $this->Html->css(array('pretty_messages/showMessage')); ?>
<?php echo $this->Html->script(array('mashup','jquery.form','pretty_messages/jquery.showMessage.min')); ?>
<script type="text/javascript" src="<?php echo $this->webroot;?>files/bin-debug/swfobject.js"></script>
<div class="container">
	<?php echo $this->element('coursesLeft');?>
	<?php echo $this->Form->create('Course',array("type"=>"file")); ?>
	<?php echo $this->Form->hidden("Course.lecturetextid",array("value"=>"0")); ?>
	<?php echo $this->Form->hidden("Course.id",array("value"=>$coursesection[0]['CourseSection']['course_id'])); ?>
<section class="right-panel">
	<h1>Syllabus<br />
		<span>&nbsp;</span>
	</h1>
	<!-- step 1 start -->
	<div class="module" id="editcoursecon">
		<?php //pr($coursesection);
		//die;
		$secno = 0 ; foreach($coursesection as $key=>$val) { 
			//pr($val['CourseLecture']);
			//die;
			$lect_id = 0;
			if($secno == 0) {
				$secno++;
			?>
			<div class="title-box">
				<h2>Course Outline</h2>
			</div>
		<?php } else { ?>
			<div class="extseccont">&nbsp;</div>
		<?php } ?>
			<div class="sections section_<?php echo $val['CourseSection']['id']; ?>">
			
				<div class="module-row">
				
					<div class="rt-sec">
						<p><?php echo $this->Form->input("CourseSection.heading.".$val['CourseSection']['id'],array("value"=>$val['CourseSection']['heading'],"class"=>"controlChars coursesectionval".$val['CourseSection']['id'],"label"=>false,"div"=>false,"maxlength"=>"64")); ?>
							<span class="counter"></span>
						</p>
						<label class="hide succ-messg module<?php echo $val['CourseSection']['id']; ?>">Updating module, Please wait...</label>
						<ul>
							<li><a class="sav change" href="javascript:void(0);" id="btn_<?php echo $val['CourseSection']['id']; ?>">Save</a></li>
							<input type="hidden" id="hiddenid<?php echo $val['CourseSection']['id']; ?>" value="<?php echo $val['CourseSection']['section_index']; ?>" />
							<input type="hidden" id="hiddencourseid<?php echo $val['CourseSection']['id']; ?>" value="<?php echo $val['CourseSection']['course_id']; ?>" />
							<li><a id="delete_<?php echo $val['CourseSection']['id']; ?>" class="delete del" val="<?php echo $val['CourseSection']['heading']; ?>" >Delete</a></li>
						</ul>
					</div>
		<?php /* code to show quizzes in a module itself */
			if(!empty($val['CourseQuiz'])) { 
				$quizlecture = array();		
				//pr($quizlecture); die; 

								$i = 0;
					foreach($val['CourseQuiz'] as $quizkey=>$quizval) { 
						if(empty($quizval['course_lecture_id'])) { ?>
							<div class="row quizrow quizcont<?php echo $quizval['id']; ?>">
								<div class="rt-sec">
									<p>Quiz <?php echo ++$i; ?>:
										<?php echo $this->Form->input("CourseQuiz.heading.".$quizval['id'],array("value"=>$quizval['heading'],"class"=>"controlChars coursequizval".$quizval['id'],"label"=>false,"div"=>false,"maxlength"=>"64")); ?>
										<span class="counter"></span>
									</p>
								</div>
								<div class="rt-sec">	
						      		<span>Quiz Description(Max Length 200 Characterssss):
									</span>
										<?php echo $this->Form->input("CourseQuiz.content.".$quizval['id'],array("type"=>"text","label"=>false,"class"=>"coursequizdesc","value"=>$quizval['content'],"maxlength"=>200,"div"=>false)); ?>
										<label class="hide err-messg err<?php echo $quizlecval['id']; ?>">Please enter heading.</label>
									<label class="hide succ-messg succ<?php echo $quizval['id']; ?>">Updating content, Please wait...</label>
										<div id="quz_add_mnu_<?php echo $quizval['id']; ?>" class="hide addquizcontent"></div>
										<span>
											<ul>
												<li><a class="view" href="<?php echo $this->Html->url("/q/".$quizval['id']."/".$this->Common->makeurl($quizval['heading'])); ?>" title="View Quiz" target="_blank">View Quiz</a></li>
												<li><a class="sav savequiz" id="savequiz_<?php echo $quizval['id']; ?>" href="javascript:void(0);" title="Save">Save</a></li>
												<li><a class="del delquiz" id="delquiz_<?php echo $quizval['id']; ?>" href="javascript:void(0);" title="Delete" val="<?php echo $quizval['heading']; ?>">Delete</a></li>
											</ul>
											
											
											
								<?php 
									if(isset($coursequestions[$quizval['id']])) { 
										?>
											<div class="qstcontainer">
												<p>Questions</p>
												<?php foreach($coursequestions[$quizval['id']] as $qstkey1=>$qstval1) {// pr($qstval1); ?>
													<span><?php echo $qstval1['question']; ?></span>
													<ul id="ul_<?php echo $qstval1['id']; ?>">
														<li><a href="<?php echo SITE_LINK."addquizquestion/".$qstval1['course_quiz_id']."/".$qstval1['type']."/".$qstval1['id'];?>" class="sav editqst" id="editqst_<?php echo $qstval1['id']; ?>_<?php echo $quizval['id']; ?>" target="_blank">Edit</a></li>
														<li><a class="del delqst" id="delqst_<?php echo $qstval1['id']; ?>">Delete</a></li>
													</ul>
												<?php } ?>
											</div>
										
										<?php 
										} else { 
										?>
											
										<?php } ?>
										
											<?php 
											if(isset($coursequestions[$quizval['id']])) { 
											?>
												<span class="btns sel_quiz" id="sel_quiz_<?php echo $quizval['id']; ?>">
													<a id="cancel_1" class="sel_quizs moreqst" href="javascript:void(0);" title="Add More Questions">Add More Questions</a>
												</span>
											<?php	
											} else {	
											?>
												<span class="btns sel_quiz" id="sel_quiz_<?php echo $quizval['id']; ?>">
													<a id="cancel_1" class="sel_quizs" href="javascript:void(0);" title="Add Question">Add Question</a>
												</span>
											<?php } ?>
										</span>
									</div>
								</div>
								
					<div class="seprator"></div>			
					<?php 
							} else {
								$quizlecture[$quizval['course_lecture_id']][] = $quizval;
								
							}
					?>
					
					<?php
						}
					}
		/* code to show quizzes in a module itself end here */
			?>
			<?php  /*if(!empty($val['CourseLectureAssignment'])) { ?>  
					<div class="row4">
							<div class="module-row module-row2">
									<div class="rt-sec">
										here
									</div>
							</div>
					</div>
			<?php } */ ?>
			
					
	<?php
	//pr($val['CourseLecture']);
		//die;
		$lect_id = 0;
		
		if(!empty($val['CourseLecture'])) { 
			foreach($val['CourseLecture'] as $key1=>$val1) {
				
			?>
					
			<?php 
				$lect_id = $val1['id'];
				if($val1['content_source'] != '' || ($val1['content_type'] == 'T' || $val1['content_type'] == 'M')) { 
		/**** code to view lecture already having content ****/
			?>
					
						<div class="row4">
							<div class="module-row module-row2">
									<div class="rt-sec">
										<p>	<?php echo $this->Form->input("CourseLecture.".$val1['id'],array("value"=>$val1['heading'],"vale"=>$val1['heading'],"div"=>false,"label"=>false,"class"=>"controlChars lecture_".$val1['id'],"maxlength"=>"64","vale"=>$val1['heading'])); ?>
										<span class="counter"></span>
										</p>
										<label class="hide succ-messg lecture_err<?php echo $val1['id']; ?>">Updating lesson, Please wait...</label>
									<ul>
										<input type="hidden" id="hiddenidlecture<?php echo $val1['id']; ?>" value="<?php echo $val1['lecture_index']; ?>" />
										<input type="hidden" id="hiddencourseidlecture<?php echo $val1['id']; ?>" value="<?php echo $val1['course_id']; ?>" />
										<li><a href="javascript:void(0);" id="btn_<?php echo $val1['id']; ?>" class="changelecture sav">Save</a></li>
										<li><a href="javascript:void(0);" id="deletelecture_<?php echo $val1['id']; ?>" class="deletelecture del" val="<?php echo $val1['heading']; ?>">Delete</a></li>
									</ul>
										<div class="add-items">
											<?php $titlearr = array("A"=>"Audio","V"=>"Video","P"=>"Presentation","D"=>"Document","M"=>"Mashup","T"=>"Text"); ?>
											<div class="box-headding">
												<p><?php echo $titlearr[$val1['content_type']]; ?> : </p> <span><?php echo $val1['content_title']; ?></span>
											</div>
											<div class="box-content">
												<?php if($val1['content_type'] == 'V') { ?>
												<a href="javascript:void(0);" class="addlecturevideocontent edit fb" id="addlecturevideocontent_<?php echo $val1['id']; ?>"><img src="<?php echo $this->webroot; ?>img/edit-icon-new.png" alt="Edit" />Edit</a>
												<a href="<?php echo $this->Html->url("/v/".$val1['id']."/".$this->Common->makeurl($val1['heading'])); ?>" class="edit fb" target="_blank" ><img src="<?php echo $this->webroot; ?>img/view-icon-new.png" alt="Preview" />Preview</a>					
													<?php } elseif($val1['content_type'] == 'A') { ?>
												<a href="javascript:void(0);" class="addlectureaudiocontent edit fb" id="addlectureaudiocontent_<?php echo $val1['id']; ?>"><img src="<?php echo $this->webroot; ?>img/edit-icon-new.png" alt="Edit" />Edit</a>
												<a href="<?php echo $this->Html->url("/v/".$val1['id']."/".$this->Common->makeurl($val1['heading'])); ?>" class="edit fb" target="_blank" ><img src="<?php echo $this->webroot; ?>img/view-icon-new.png" alt="Preview" />Preview</a>
													<?php } elseif($val1['content_type'] == 'P') { ?>
												<a href="javascript:void(0);" class="addlecturepresentcontent edit fb" id="addlecturepresentcontent_<?php echo $val1['id']; ?>"><img src="<?php echo $this->webroot; ?>img/edit-icon-new.png" alt="Edit" />Edit</a>
												<a href="<?php echo $this->Html->url("/v/".$val1['id']."/".$this->Common->makeurl($val1['heading'])); ?>" class="edit fb" target="_blank"><img src="<?php echo $this->webroot; ?>img/view-icon-new.png" alt="Preview" />Preview</a>
													<?php } elseif($val1['content_type'] == 'D') { ?>
												<a href="javascript:void(0);" class="addlecturedoccontent edit fb" id="addlecturedoccontent_<?php echo $val1['id']; ?>"><img src="<?php echo $this->webroot; ?>img/edit-icon-new.png" alt="Edit" />Edit</a>
												<a href="<?php echo $this->Html->url("/v/".$val1['id']."/".$this->Common->makeurl($val1['heading'])); ?>" class="edit fb" target="_blank"><img src="<?php echo $this->webroot; ?>img/view-icon-new.png" alt="Preview" />Preview</a>
													<?php } elseif($val1['content_type'] == 'T') { ?>
												<a href="javascript:void(0);" class="addlecturetextcontent edit fb" id="addlecturetextcontent_<?php echo $val1['id']; ?>"><img src="<?php echo $this->webroot; ?>img/edit-icon-new.png" alt="Edit" />Edit</a>
												<a href="<?php echo $this->Html->url("/v/".$val1['id']."/".$this->Common->makeurl($val1['heading'])); ?>" class="edit fb" target="_blank"><img src="<?php echo $this->webroot; ?>img/view-icon-new.png" alt="Preview" />Preview</a>
													<?php } elseif($val1['content_type'] == 'M') { ?>
												<a href="javascript:void(0);" class="addlecturemashupcontent edit fb" id="addlecturemashupcontent_<?php echo $val1['id']; ?>"><img src="<?php echo $this->webroot; ?>img/edit-icon-new.png" alt="Edit" />Edit</a>
												<a href="<?php echo $this->Html->url("/v/".$val1['id']."/".$this->Common->makeurl($val1['heading'])); ?>" class="edit fb" target="_blank"><img src="<?php echo $this->webroot; ?>img/view-icon-new.png" alt="Preview" />Preview</a>
													<?php } ?>
												<a href="javascript:void(0);" class="edit complimentary fb" id="<?php echo $val1['id']; ?>" ><img src="<?php echo $this->webroot; ?>img/add-icon-new.png" />Add Supplementary Stuff</a>
													
												<div class="editlecturecontent<?php echo $val1['id']; ?> hide">
													<span class="addvideocontainer<?php echo $val1['id']; ?> hide addcont addcont_new V">
												<div class="file_<?php echo $val1['id']; ?>" >
													<?php echo $this->Form->input("video",array("type"=>"file","class"=>"fileoupload","id"=>"video_".$val1['id']."_".$val1['course_section_id']."_".$val1['course_id'],"div"=>false,"label"=>false)); ?> 
													<span class="btns">
													<a href="javascript:void(0);" class="addlecturevideocontent" id="addlecturevideocontents_<?php echo $val1['id']; ?>">Cancel</a>
													</span>
														<p class="videoresponse<?php echo $val1['id']; ?> hide" style="color: green;display: block;font-size: 14px;"></p>
														<div>OR <a href="javascript:void(0);" id="addfromyoutube_<?php echo $val1['id'] ?>" class="addyoutube">Import From Youtube/Vimeo</a></div>
														<br/><em>Use mp4, mov, wmv, flv, 3gp, quicktime, avi, mpeg or x-wav file no larger than 1.0 GiB.</em>
													</div>
													<div class="ext_<?php echo $val1['id']; ?>" style="display:none;">
														<?php echo $this->Form->input("video",array("type"=>"text","class"=>"fileoupload extfile_".$val1['id'],"id"=>"video_".$val1['id']."_".$val1['course_section_id']."_".$val1['course_id'],"label"=>"Link")); ?>
														<button class="previewyoutube" id="previewyoutube_<?php echo $val1['id']; ?>">Preview</button>
														<button class="cancelyoutube" id="cancelyoutube_<?php echo $val1['id']; ?>">Cancel</button>
													</div>
													<div id="previewextvideo_<?php echo $val1['id']; ?>" style="display:none;">
														<div id="previewvideoinline_<?php echo $val1['id']; ?>">Uploading, please wait...</div>
														<button id="uploadextenallink_<?php echo $val1['id']; ?>" class="uploadexternallink">Upload</button>
													</div>
													</span>
													<span class="addaudiocontainer<?php echo $val1['id']; ?> hide addcont addcont_new A">
													<?php echo $this->Form->input("audio",array("type"=>"file","class"=>"fileoupload","id"=>"audio_".$val1['id']."_".$val1['course_section_id']."_".$val1['course_id'],"label"=>false,"div"=>false)); ?>
													<span class="btns">
														<a href="javascript:void(0);" class="addlectureaudiocontent" id="addlectureaudiocontents_<?php echo $val1['id']; ?>">Cancel</a>
													</span>
													<p class="audioresponse<?php echo $val1['id']; ?> hide" style="color: green;display: block;font-size: 14px;"></p>
													<em>Use mp3, wav, wma, ra, ram, rm, m4a or ogg file no larger than 1.0 GiB.</em>
													<label class="errmsg hide"></label>
													</span>
													<span class="addpresentcontainer<?php echo $val1['id']; ?> hide addcont addcont_new P">
														<?php echo $this->Form->input("Course.Presentation.".$val1['id'],array("type"=>"file","class"=>"fileoupload upload_presentation_".$val1['id'],"id"=>"presentation_".$val1['id']."_".$val1['course_section_id']."_".$val1['course_id'],"label"=>false,"div"=>false)); ?>
														<span class="btns">
															<a href="javascript:void(0);" class="addlecturepresentcontent" id="addlecturepresentationcontents_<?php echo $val1['id']; ?>">Cancel</a>
														</span>
														<?php //echo $this->Form->input("Upload",array('type'=>'button',"class"=>'upload_presentation uploadbutton',"id"=>"upload_presentation_".$val1['id'],"label"=>false,"div"=>false)); ?>
														<p class="presentationresponse<?php echo $val1['id']; ?> hide" style="color: green;display: block;font-size: 14px;"></p>
														<em>Use .pdf, .ppt or .pptx file no larger than 1.0 GiB.</em>
														<br/>
														<label class="errmsg hide"></label>
													
													</span>
													<span class="adddoccontainer<?php echo $val1['id']; ?> hide addcont addcont_new D">
														<?php echo $this->Form->input("Document",array("type"=>"file","class"=>"fileoupload","id"=>"document_".$val1['id']."_".$val1['course_section_id']."_".$val1['course_id'],"label"=>false,"div"=>false)); ?>
														<span class="btns">
															<a href="javascript:void(0);" class="addlecturedoccontent" id="addlecturedoccontents_<?php echo $val1['id']; ?>">Cancel</a>
														</span>
														<p class="documentresponse<?php echo $val1['id']; ?> hide" style="color: green;display: block;font-size: 14px;"></p>
														<em>Use .pdf, .doc or .docx file no larger than 1.0 GiB.</em>
														<br/>
														<label class="errmsg hide"></label>
													</span>
													<span class="addtextcontainer<?php echo $val1['id']; ?> addcont addcont_new hide T new-1">
														<?php echo $this->Form->input("Course.text.".$val1['id'],array("type"=>"textarea","class"=>"addtext","label"=>false,"value"=>($val1['content_type'] == 'T')?$val1['content']:'',"maxlength"=>"10000")); ?>

														<p class="textresponse<?php echo $val1['id']; ?> hide" style="color: green;display: block;font-size: 14px;"></p>
														<label class="errmsg hide"></label>
														<?php echo $this->Form->submit("Save",array("class"=>"savetext")); ?>
													</span>
													<span class="addlecturemashupcontent<?php echo $val1['id']; ?> addcont addcont_mashup hide M">
													<span class="mashup-no">1</span>  <span class="mashup-heading">Pick a Video</span>
													<p class="textresponse hide" style="color: green;display: block;font-size: 14px;"></p>
													<span class="mashup-upload-sec">
														<em>Use video file no larger than 100 MB.</em>
														<br/>
														<?php echo $this->Form->input("Course.mashupVideo.".$val1['id'],array("type"=>"file","label"=>"Choose Video","class"=>"choose_mashup_video")); ?>
														<?php echo $this->Form->input("Upload",array('type'=>'button',"class"=>'upload_mashup_video',"id"=>"upload_mashup_video_".$val1['id'],"label"=>false,"div"=>false)); ?>
														<p class="video_uploading_status_msg" id="<?php echo 'video_uploading_status_msg_'.$val1['id']; ?>" style="margin-left:5px"></p>
														
														<span class="video_uploading_fade_span" id="<?php echo 'video_uploading_fade_span_'.$val1['id']; ?>"></span>
														
													</span>
													<br />
													<span class="mashup-upload-sec">
														<span class="mashup-no">2</span>  <span class="mashup-heading">Pick a Presentation</span>
														<br />
														<em>Use .pdf file no larger than 100 MB.</em>
														<br/>
														<?php echo $this->Form->input("Course.mashupPdf.".$val1['id'],array("type"=>"file","label"=>"Choose Pdf","class"=>"choose_mashup_pdf")); ?>
														<?php echo $this->Form->input("Upload",array('type'=>'button',"class"=>'upload_mashup_pdf',"id"=>"upload_mashup_pdf_".$val1['id'],"label"=>false,"div"=>false)); ?>
														<p class="pdf_uploading_status_msg" id="<?php echo 'pdf_uploading_status_msg_'.$val1['id']; ?>" style="margin-left:5px"></p>
														<label class="errmsg hide"></label>
														
														
														<span class="pdf_uploading_fade_span" id="<?php echo 'pdf_uploading_fade_span_'.$val1['id']; ?>"></span>
													</span>
													<p style="float: left; margin: 25px 0 0;clear:both;"><a href="javascript:void(0);" id="<?php echo "merge_video_pdf_link_".$val1['id']; ?>" class="merge_video_pdf_link button">Create Mashup</a></p>
													<span>
														<span class="mashup_maker_processing_span" style="display: none;" id="<?php echo 'mashup_maker_processing_span_'.$val1['id']; ?>">
															<?php echo $this->Html->image('processing_horizontal.gif',array('id'=>'mashup_maker_processing_img_'.$val1['id'])); ?>
														</span>
														<span class="mashup_maker_span" style="display: none;" id="<?php echo 'mashup_maker_span_'.$val1['id']; ?>"></span>
													</span>
													</span>
													</div>
													<?php /** code to add supplimetary **/ ?>
													<span class="addcont addcont_new addsupp_<?php echo $val1['id']; ?> S" style="display:none;">	
														<span class="addsup_<?php echo $val1['id']; ?>" style="display:block;">
															<?php echo $this->Form->input("Supplementary Stuff",array("type"=>"file","class"=>"suppliupload supup_".$val1['id'],"id"=>"supplimentary_".$val1['id']."_".$val1['course_section_id']."_".$val1['course_id'],"label"=>false,"div"=>false)); ?>
															<span class="btns">
																<a href="javascript:void(0);" class="complimentary" id="<?php echo $val1['id']; ?>_">Cancel</a>
															</span>
															<p class="hide suppliresponse<?php echo $val1['id']; ?>" style="color: green;font-size: 14px;display:none;">Uploading please wait..</p>
															<em>*Info - You can add any type of file as Additional Material for the Lesson.</em>
														</span>
															
														<span class="addext_<?php echo $val1['id']; ?>" style="display:none;">
															<?php echo $this->Form->input("External Link",array("type"=>"text","class"=>"suppliuploadext".$val1['id'],"id"=>"supplimentary_".$val1['id'],"label"=>"External Link")); ?>
															<input type="button" id="extbtn_<?php echo $val1['id']; ?>" class="addext" value="Submit" />
														</span>
														<!--p> OR <a href="javascript:void(0);" id="addfromlibrary_<?php ///echo $this->data['Course']['user_id']; ?>" class="addfromlibrary" val="All" extid="<?php //echo $val1['id']; ?>">Add From Library</a> OR <a href="javascript:void(0);" id="addexternal_<?php //echo $val1['id'] ?>" class="addexternal">Add External Link</a></p>
														<p class="suppliresponse<?php //echo $val1['id']; ?> hide" style="color: green;display: block;font-size: 14px;"></p>
														<p class="supplierrresponse<?php //echo $val1['id']; ?> hide" style="color: red;display: block;font-size: 14px;"></p>
														<label class="errmsg hide"></label>-->
													</span>
													<?php /** code to add supplimetary end here **/ ?>
													<span class="addcont libcontainer" id="addlibrary_<?php echo $val1['id'] ?>" style="display:none;"> </span>
													
													
													
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php
							/**** code to view lecture already having content end here ****/
								
								
							} else {
							?>	
								<div class="addnew_cont_row_<?php echo $val1['id']; ?>">
									<div class="module-row module-row2">
										<div class="rt-sec">
											<p>
												<?php echo $this->Form->input("CourseLecture.".$val1['id'],array("value"=>$val1['heading'],"vale"=>$val1['heading'],"div"=>false,"label"=>false,"class"=>"controlChars lecture_".$val1['id'],"maxlength"=>"64")); ?>
												<span class="counter"></span>
											</p>
											<label class="hide succ-messg lecture_err<?php echo $val1['id']; ?>">Updating lesson, Please wait...</label>
											<br/>
											<span class="btns sel_lect" val="addcontentcontainer<?php echo $val1['id']."_N"; ?>" id="sel_lect_<?php echo $val1['id']; ?>">
												<a href="javascript:void(0);" class="sel_lects" title="Add Content">Add Content</a>
											</span>
											<ul>
												<input type="hidden" id="hiddencoursedescriptionlecture<?php echo $val1['id']; ?>" value="<?php echo $val1['course_description']; ?>" />
												<input type="hidden" id="hiddenidlecture<?php echo $val1['id']; ?>" value="<?php echo $val1['lecture_index']; ?>" />
												<input type="hidden" id="hiddencourseidlecture<?php echo $val1['id']; ?>" value="<?php echo $val1['course_id']; ?>" />
												<li><a href="javascript:void(0);" id="btn_<?php echo $val1['id']; ?>" class="changelecture sav">Save</a></li>
												<li><a href="javascript:void(0);" id="deletelecture_<?php echo $val1['id']; ?>" class="deletelecture del" val="<?php echo $val1['heading']; ?>">Delete</a></li>
											</ul>
										<div class="addcontentcontainer<?php echo $val1['id']; ?> hide add-items add-item">
											<div class="box-headding bxhead">&nbsp;</div>
											<span class="addvideocontainer<?php echo $val1['id']; ?> hide addcont addcont_new V">
												<div class="file_<?php echo $val1['id']; ?> box-content" >
													<?php echo $this->Form->input("video",array("type"=>"file","class"=>"fileoupload","id"=>"video_".$val1['id']."_".$val1['course_section_id']."_".$val1['course_id'],"div"=>false,"label"=>false)); ?> 
													<p class="videoresponse<?php echo $val1['id']; ?> hide" style="color: green;display: block;font-size: 14px;"></p>
													<div>OR <a href="javascript:void(0);" id="addfromyoutube_<?php echo $val1['id'] ?>" class="addyoutube">Import From Youtube/Vimeo</a> <!--OR <a href="javascript:void(0);" id="addfromlibrary_<?php //echo $this->data['Course']['user_id']; ?>" class="addfromlibrary" val="V" extid="<?php //echo $val1['id']; ?>">Add From Library</a--></div>
													<br/><em>Use mp4, mov, wmv, flv, 3gp, quicktime, avi, mpeg or x-wav file no larger than 1.0 GiB.</em>
													<label class="errmsg hide"></label>
												</div>
												<!-- container contain external video -->
													<div class="ext_<?php echo $val1['id']; ?>" style="display:none;">
														<?php echo $this->Form->input("video",array("type"=>"text","class"=>"fileoupload extfile_".$val1['id'],"id"=>"video_".$val1['id']."_".$val1['course_section_id']."_".$val1['course_id'],"label"=>"Link")); ?>
														<button class="previewyoutube" id="previewyoutube_<?php echo $val1['id']; ?>">Preview</button>
														<button class="cancelyoutube" id="cancelyoutube_<?php echo $val1['id']; ?>">Cancel</button>
													</div>
													<div id="previewextvideo_<?php echo $val1['id']; ?>" style="display:none;">
														<div id="previewvideoinline_<?php echo $val1['id']; ?>">Uploading, please wait...</div>
														<button id="uploadextenallink_<?php echo $val1['id']; ?>" class="uploadexternallink">Upload</button>
													</div>
												<!-- container contain external video -->	
												
											</span>
											<span class="addaudiocontainer<?php echo $val1['id']; ?> hide addcont addcont_new A">
												<div class="box-content">
													<?php echo $this->Form->input("audio",array("type"=>"file","class"=>"fileoupload","id"=>"audio_".$val1['id']."_".$val1['course_section_id']."_".$val1['course_id'],"label"=>false,"div"=>false)); ?> <!--p>OR <a href="javascript:void(0);" id="addfromlibrary_<?php echo $this->data['Course']['user_id']; ?>" class="addfromlibrary" val="A" extid="<?php //echo $val1['id']; ?>">Add From Library</a></p-->
													<p class="audioresponse<?php echo $val1['id']; ?> hide" style="color: green;display: block;font-size: 14px;"></p>
													<em>Use mp3, wav, wma, ra, ram, rm, m4a or ogg file no larger than 1.0 GiB.</em>
													<label class="errmsg hide"></label>
												</div>
											</span>
											<span class="addpresentcontainer<?php echo $val1['id']; ?> hide addcont addcont_new P">
												<div class="box-content">
													<?php echo $this->Form->input("Course.Presentation.".$val1['id'],array("type"=>"file","class"=>"fileoupload upload_presentation_".$val1['id'],"id"=>"presentation_".$val1['id']."_".$val1['course_section_id']."_".$val1['course_id'],"label"=>false,"div"=>false)); ?>
													<?php //echo $this->Form->input("Upload",array('type'=>'button',"class"=>'upload_presentation uploadbutton',"id"=>"upload_presentation_".$val1['id'],"label"=>false,"div"=>false)); ?>
													<!--p>OR <a href="javascript:void(0);" id="addfromlibrary_<?php echo $this->data['Course']['user_id']; ?>" class="addfromlibrary" val="P" extid="<?php //echo $val1['id']; ?>">Add From Library</a></p-->
													<p class="audioresponse hide" style="color: green;display: block;font-size: 14px;"></p>
													<p class="presentationresponse<?php echo $val1['id']; ?> hide" style="color: green;display: block;font-size: 14px;"></p>
													<em>Use .pdf, .ppt, .pptx file no larger than 1.0 GiB.</em>
													<br/>
													
													<label class="errmsg hide"></label>
												</div>
											</span>
											<span class="adddoccontainer<?php echo $val1['id']; ?> hide addcont addcont_new D">
												<div class="box-content">
													<?php echo $this->Form->input("Document",array("type"=>"file","class"=>"fileoupload","id"=>"document_".$val1['id']."_".$val1['course_section_id']."_".$val1['course_id'],"label"=>false)); ?><!--p>OR <a href="javascript:void(0);" id="addfromlibrary_<?php// echo $this->data['Course']['user_id']; ?>" class="addfromlibrary" val="D" extid="<?php //echo $val1['id']; ?>">Add From Library</a></p-->
													<p class="audioresponse<?php echo $val1['id']; ?> hide" style="color: green;display: block;font-size: 14px;"></p>
													<p class="documentresponse<?php echo $val1['id']; ?> hide" style="color: green;display: block;font-size: 14px;"></p>
													<em>Use .pdf, .doc, .docx file no larger than 1.0 GiB.</em>
													<br/>
													
													<label class="errmsg hide"></label>
												</div>
											</span>
											<span class="addtextcontainer<?php echo $val1['id']; ?> addcont addcont_new hide T new-1">
												<div class="box-content">
													<?php echo $this->Form->input("Course.text.".$val1['id'],array("type"=>"textarea","class"=>"addtext","label"=>false,"value"=>($val1['content_type'] == 'T')?$val1['content']:'',"maxlength"=>"10000")); ?>
													
													<p class="textresponse<?php echo $val1['id']; ?> hide" style="color: green;display: block;font-size: 14px;"></p>
													<label class="errmsg hide"></label>
													<?php echo $this->Form->submit("Save",array("class"=>"savetext")); ?>
												</div>
											</span>

										<span class="addlecturemashupcontent<?php echo $val1['id']; ?> addcont addcont_mashup hide M">
										<div class="box-content">
										<span class="mashup-no">1</span>  <span class="mashup-heading">Pick a Video</span>
											<p class="textresponse hide" style="color: green;display: block;font-size: 14px;"></p>
											
											<span class="mashup-upload-sec">
											 <em>Use video file no larger than 100 MB.</em>
												<br/>
												<?php echo $this->Form->input("Course.mashupVideo.".$val1['id'],array("type"=>"file", "id"=>"CourseMashupVideo".$val1['id'],"label"=>"Choose Video","class"=>"choose_mashup_video")); ?>
												<?php echo $this->Form->input("Upload",array('type'=>'button',"class"=>'upload_mashup_video',"id"=>"upload_mashup_video_".$val1['id'],"label"=>false,"div"=>false)); ?>
												<p class="video_uploading_status_msg" id="<?php echo 'video_uploading_status_msg_'.$val1['id']; ?>" style="margin-left:5px"></p>
												<label class="errmsg hide"></label>
												
													
												<span class="video_uploading_fade_span" id="<?php echo 'video_uploading_fade_span_'.$val1['id']; ?>"></span>
											</span>
											<span class="mashup-upload-sec">
											<span class="mashup-no">2</span>  <span class="mashup-heading">Pick a Presentation</span>
												<br>
												<em><br>Use .pdf file no larger than 100 MB.</em>
												<br/>
												<?php echo $this->Form->input("Course.mashupPdf.".$val1['id'],array("type"=>"file","id"=>"CourseMashupPdf".$val1['id'],"label"=>"Choose Pdf","class"=>"choose_mashup_pdf")); ?>
												<?php echo $this->Form->input("Upload",array('type'=>'button',"class"=>'upload_mashup_pdf',"id"=>"upload_mashup_pdf_".$val1['id'],"label"=>false,"div"=>false)); ?>
												<p class="pdf_uploading_status_msg" id="<?php echo 'pdf_uploading_status_msg_'.$val1['id']; ?>" style="margin-left:5px"></p>
												<label class="errmsg hide"></label>
												
												
												<span class="pdf_uploading_fade_span" id="<?php echo 'pdf_uploading_fade_span_'.$val1['id']; ?>"></span>

											</span>
											
											
											<p style="float: left;margin: 25px 0 0;clear:both;"><a href="javascript:void(0);" id="<?php echo "merge_video_pdf_link_".$val1['id']; ?>" class="merge_video_pdf_link button">Create Mashup</a></p>
											<span>
												
												<span class="mashup_maker_processing_span" style="display: none;" id="<?php echo 'mashup_maker_processing_span_'.$val1['id']; ?>">
													<?php echo $this->Html->image('processing_horizontal.gif',array('id'=>'mashup_maker_processing_img_'.$val1['id'])); ?>
												</span>

												<span class="mashup_maker_span" style="display: none;" id="<?php echo 'mashup_maker_span_'.$val1['id']; ?>"></span>
											</span>
											
										</span>
										</div>
										<span class="addcont" id="addlibrary_<?php echo $val1['id'] ?>" style="display:none;">
										</span>
									</div>
									</div>
								</div>
								<div class="syllabus-rt hide" id="addcontentright_<?php echo $val1['id']; ?>">
									<div class="mid-btn">
										<a href="javascript:void(0);" class="addcontent" title="Video" val="V"><span class="left"><span class="add-btn"><em class="video-icon"></em></span><br>
										Video</span></a>
										<a href="javascript:void(0);" class="addcontent" title="Audio" val="A"><span class="left"><span class="add-btn"><em class="audio-icon"></em></span><br>
										Audio</span></a>
										<a href="javascript:void(0);" class="addcontent" title="Presentation" val="P"><span class="left"><span class="add-btn"><em class="ppt-icon"></em></span><br>
										PPT</span></a>
										<a href="javascript:void(0);" class="addcontent" title="Document" val="D"><span class="left"><span class="add-btn"><em class="doc-icon"></em></span><br>
										Document</span></a>
										<a href="javascript:void(0);" class="addcontent" title="Text" val="T"><span class="left"><span class="add-btn"><em class="txt-icon"></em></span><br>
										Text</span></a>
										<!--a href="javascript:void(0);" class="addcontent" title="Mashup" val="M"><span class="left"><span class="add-btn"><em class="mashup-icon"></em></span><br>
										Mashup</span></a-->
									</div>
								</div>
							</div>
							<?php	
							}
					?>
					<?php
					if ( isset($tmpAssignment[$val1['id']]) ) {
					?>
			 <div class="rt-sec">
				<div class="qstcontainer">
					<p>Assignments</p>
						<?php //here in below two lines we are use to get the list of all the assignments for a particular lecture. we have set key value see carefully.
						$i = 1;// this is for showing assignments in loop starts from 1 to "Assignment".$i++ in span tag below.
						   foreach($tmpAssignment[$val1['id']] as $assignKey=>$assignVal){
							?> 
							<span> <?php echo "Assignment".$i++;;//print all the lists of the assignments
								   ?>
							</span>
								<ul>
									<li><a href =<?php echo $this->Html->url("/assignment/".$assignVal['CourseLectureAssignment']['course_lecture_id']."/".$coursesection[0]['CourseSection']['course_id']."/".$assignVal['CourseLectureAssignment']['id']); ?> class="sav editqst" id="editqst_<?php echo $assignVal['CourseLectureAssignment']['id']; ?>_<?php echo $assignVal['CourseLectureAssignment']['id']; ?>" target="_blank">Edit</a> </li>
									<li><a href="<?php echo $this->Html->url("/assignment_preview/".$assignVal['CourseLectureAssignment']['id']."/".$coursesection[0]['CourseSection']['course_id']."/".$assignVal['CourseLectureAssignment']['course_lecture_id']); ?>" class="view " target="_blank">Preview</a></li>
									<li><a class="del delassign" id="delassign_<?php echo $assignVal['CourseLectureAssignment']['id']; ?>">Delete</a> </li><?php//here to delete we first create a delassign function in the functionality.js page then in the controller we create delasssignment function as we create . ?>
								</ul>
			<?php	} ?>
			
			   </div>
			</div>
			<?php }	?>
					
					<div class="seprator"></div>
					<?php 
				if (isset($quizlecture[$val1['id']])) { 
					foreach($quizlecture[$val1['id']] as $quizleckey=>$quizlecval) { ?>
						<div class="row quizrow quizcont<?php echo $quizlecval['id']; ?>">
							<div class="rt-sec">
								
								<p>Quiz <?php echo ++$i; ?>:
								<?php echo $this->Form->input("CourseQuiz.heading.".$quizlecval['id'],array("value"=>$quizlecval['heading'],"class"=>"controlChars coursequizval".$quizlecval['id'],"label"=>false,"div"=>false,"maxlength"=>"64")); ?>
								<span class="counter"></span>
								<label class="hide err-messg err<?php echo $quizlecval['id']; ?>">Please enter heading.</label>
								</p>
							</div>
							<div class="rt-sec">
								<span>Quiz Description(Max Length 200 Characters):
								</span>
									<?php echo $this->Form->input("CourseQuiz.content.".$quizlecval['id'],array("type"=>"text","label"=>false,"class"=>"coursequizdesc","value"=>$quizlecval['content'],"maxlength"=>200,"div"=>false)); ?>
							<?php 
							if(isset($coursequestions[$quizlecval['id']])) { 
							?>
								<div class="qstcontainer">
									<p>Questions</p>
									<?php foreach($coursequestions[$quizlecval['id']] as $qstkey=>$qstval) { //pr($qstval); die;  ?>
										<span><?php echo $qstval['question']; ?></span>
										<ul id="ul_<?php echo $qstval['id']; ?>">
											<li><a class="del delqst" id="delqst_<?php echo $qstval['id']; ?>">Delete</a></li>
											<li><a href="<?php echo SITE_LINK."addquizquestion/".$qstval['course_quiz_id']."/".$qstval['type']."/".$qstval['id']; ?>" class="sav editqst" id="editqst_<?php echo $qstval['id']; ?>_<?php echo $quizlecval['id']; ?>" target="_blank">Edit</a></li>
										</ul>
									<?php } ?>
								</div>

							<?php 
							} else { 
							?>

							<?php } ?>
							<label class="hide succ-messg succ<?php echo $quizlecval['id']; ?>">Updating content, Please wait...</label>
							<div id="quz_add_mnu_<?php echo $quizlecval['id']; ?>" class="hide addquizcontent"></div>
								<span>
									<ul>
										<li><a class="view" href="<?php echo $this->Html->url("/q/".$quizlecval['id']."/".$this->Common->makeurl($quizlecval['heading'])); ?>" title="View Quiz" target="_blank">View Quiz</a></li>
										<li><a class="sav savequiz" id="savequiz_<?php echo $quizlecval['id']; ?>" href="javascript:void(0);" title="Save">Save</a></li>
										<li><a class="del delquiz" id="delquiz_<?php echo $quizlecval['id']; ?>" href="javascript:void(0);" title="Delete" val="<?php echo $quizlecval['heading']; ?>">Delete</a></li>
									</ul>
									<?php 
									if(isset($coursequestions[$quizlecval['id']])) { 
									?>
										<span class="btns sel_quiz" id="sel_quiz_<?php echo $quizlecval['id']; ?>">
											<a id="cancel_1" class="sel_quizs moreqst" href="javascript:void(0);" title="Add More Questions">Add More Questions</a>
										</span>
									<?php	
									} else {	
									?>
										<span class="btns sel_quiz" id="sel_quiz_<?php echo $quizlecval['id']; ?>">
											<a id="cancel_1" class="sel_quizs" href="javascript:void(0);" title="Add Question">Add Question</a>
										</span>
									<?php } ?>
								</span>
							</div>
							
						</div>
						<?php if(!empty($quizlecval['heading'])) { //pr($quizlecval['heading']);
							//die;?>
						<div class="seprator"></div>
						<?php } ?>
				<?php
					}
				}
					
						}
					}
					?>	
					
				</div>
				<div class="add-module-btn1">
					<label class="hide add_new_lec_quiz succ-messg msg<?php echo $val['CourseSection']['id'];  ?>" >Loading, Please wait...</label><br/>
					<?php //pr($val);
					//die; ?>
					<?php if (!empty($lect_id)) { ?>
						<a href="<?php echo $this->Html->url("/assignment/".$lect_id."/".$coursesection[0]['CourseSection']['course_id']); ?>"><input type="button"  value="Add Assignment" id="add_new_sec_<?php echo $val['CourseSection']['id']; ?>" class="module-btn1 add_new_sec_assign" /></a>
					<?php } ?>
					<input type="button" value="Add Lesson"  id="add_new_sec_<?php echo $val['CourseSection']['id']; ?>" class="module-btn1 add_new_sec_lec" target="_blank" />
					<input type="button" value="Add Quiz"  class="module-btn1 add_new_sec_quiz" id="add_new_quiz_<?php echo $val['CourseSection']['id']."_".$lect_id; ?>"/>
				</div>
			</div>
		<?php } ?>
		<div class="add-module-btn">
			<label class="hide add_new_mod succ-messg">Loading, Please wait...</label><br/>
			<input type="button" value="Add Module" class="module-btn add_new_module" />
		</div>
	<!-- step 1 end -->

	</div>
</section>
<?php echo $this->Form->end(); ?>
</div>
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<?php echo $this->Fck->loadlecturecontent("addtext"); ?>
<?php //echo $this->Fck->loadextras('coursequizdesc');  ?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".savequiz").live("click",function(e){
			var lecid = $(this).attr("id").split("_");
			if($("#CourseQuizHeading"+lecid[1]).val().length != 0) {
				$(".succ"+lecid[1]).show();
				var conid = "CourseQuizContent"+lecid[1];
				var editordata = $("#"+conid).val();
				$.ajax({
					url: BASE_URL+"courses/addquestions",
					type: 'post',
					data  : "quizid="+lecid[1]+"&content="+editordata+"&heading="+$("#CourseQuizHeading"+lecid[1]).val(), 
					success: function(data) {
						if(parseInt(data) == 1) {
							$(".succ"+lecid[1]).html("Quiz successfully updated.");
						} else {
							$(".succ"+lecid[1]).html("Quiz can not be updated.");
							$(".succ"+lecid[1]).addClass("err"+lecid[1]);
						}
						setInterval('$(".succ'+lecid[1]+'").hide();',2000);
					},
					error : function(err, req) {
						alert("Your browser broke!");
					}
				});
			} else {
				$(".err"+lecid[1]).show();
				lecerrid = "err"+lecid[1];
				setInterval('$(".'+lecerrid+'").hide();',2000);
			}
			e.stopImmediatePropagation();
		});
		
		/*$(function() {
			var offset = $(".add-content").offset();
			var topPadding = 15;
			$(window).scroll(function() {
				if ($(window).scrollTop() > offset.top) {
					$(".add-content").stop().animate({
						marginTop: $(window).scrollTop() - offset.top + topPadding
					});
				} else {
					$(".add-content").stop().animate({
						marginTop: 0
					});
				};
			});
		});*/
	});
</script>
