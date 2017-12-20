<h1> Questions</h1>
<div class = "quizformcontainer" >
<?php //pr($data); ?>
<?php echo $this->Form->create("CourseQuizQuestion",array("type"=>"file","enctype" => "multipart/form-data")); ?>
<?php //pr($this->request->data); ?>
<!--form for multiple choice-->
<?php echo $this->Form->input("CourseQuizQuestion.id",array("type"=>"hidden")); ?>
<?php if (strtolower($questionType) == 'm') {  ?>
	
  <div class="addquestionnew">
	  
	    <div  class="textarea" style="margin-bottom:20px;">
	       <label for = "CourseQuizQuestionQuestion"> Question</label>
	       <br/>
	         <?php echo $this->Form->input('question',array("type"=>"text","placeholder"=>"Enter question here","label"=>false,"div"=>false,"cols"=>"135","row"=>"10","class"=>"question")); ?>
	         
        </div>
		<?php echo isset($strError)?$strError:''; ?>
		   <label> Options </label>
				<ul class="newoptions" style="margin-top:10px;"> 
					<?php if (isset($this->request->data['CourseQuizQuestionOption'])) {  ?>
						<?php foreach($this->request->data['CourseQuizQuestionOption'] as $key=>$val) { ?>
							<li id="<?php echo $key+1; ?>">
								<?php echo $this->Form->input("CourseQuizQuestionOption.".$key.".answer",array("class"=>"optquestion","label"=>false,"type"=>"checkbox","div"=>false)); ?> 
								<?php echo $this->Form->input("CourseQuizQuestionOption.".$key.".options",array("class"=>"optquestionval","placeholder"=>"Enter option here","type"=>"text","label"=>false,"div"=>false,"maxlength"=>"150")); ?> 
								<?php echo $this->Form->input("CourseQuizQuestionOption.".$key.".id",array("type"=>"hidden")); ?> 
							</li>
						<?php } ?>
					<?php } else { ?>
					<li id="1">
						<?php echo $this->Form->input("CourseQuizQuestionOption.0.answer",array("class"=>"optquestion","label"=>false,"type"=>"checkbox","div"=>false)); ?> 
						<?php echo $this->Form->input("CourseQuizQuestionOption.0.options",array("class"=>"optquestionval","placeholder"=>"Enter option here","type"=>"text","label"=>false,"div"=>false,"maxlength"=>"150")); ?> 
					</li>
		
					<li id="2">
						<?php echo $this->Form->input("CourseQuizQuestionOption.1.answer",array("type"=>"checkbox","label"=>false,"div"=>false)); ?> 
						<?php echo $this->Form->input("CourseQuizQuestionOption.1.options",array("class"=>"optquestionval","placeholder"=>"Enter option here","type"=>"text","label"=>false,"div"=>false,"maxlength"=>"150")); ?> 
					</li>
					
					<li id="3">
						<?php echo $this->Form->input("CourseQuizQuestionOption.2.answer",array("type"=>"checkbox","label"=>false,"div"=>false)); ?> 
						<?php echo $this->Form->input("CourseQuizQuestionOption.2.options",array("class"=>"optquestionval","placeholder"=>"Enter option here","type"=>"text","div"=>false,"label"=>false,"maxlength"=>"150")); ?> 
					</li>
					
					<li id="4">
						<?php echo $this->Form->input("CourseQuizQuestionOption.3.answer",array("type"=>"checkbox","label"=>false,"div"=>false)); ?>
						<?php echo $this->Form->input("CourseQuizQuestionOption.3.options",array("class"=>"optquestionval","placeholder"=>"Enter option here","type"=>"text","label"=>false,"div"=>false,"maxlength"=>"150")); ?>  
					</li>
				<?php } ?>
					<li>
						<input type="button" value="Add Option" id="addnewopt" val = "<?php echo $questionType; ?>" />
						<input type="button" value="Remove Option" id="remnewopt" />
					</li>
				</ul>
	</div>
	 
<?php } ?>		

<!--form for true/false -->

<?php if($questionType == 't') { ?>
	
	<div class="addquestionnew">
	   
	    <div  class="textarea" style="margin-bottom:20px;">
	       <label for = "CourseQuizQuestionQuestion"> Question</label>
	       <br/>
	         <?php echo $this->Form->input('question',array("type"=>"text","placeholder"=>"Enter question here","label"=>false,"div"=>false,"cols"=>"135","row"=>"10","class"=>"question")); ?>
        </div>
          <?php echo isset($strError)?$strError:''; ?>
			    <ul class="newoptions" style="margin-top:10px;">
					  
				     <li id="1" style="float: left;width: 100%;">
						  <?php echo $this->Form->input("CourseQuizQuestionOption.0.answer",array("class"=>"optquestion","type"=>"checkbox","label"=>"TRUE","div"=>false)); ?>
						  <?php echo $this->Form->input("CourseQuizQuestionOption.0.options",array("class"=>"optquestionval","type"=>"hidden", "value"=>"true","div"=>false,"maxlength"=>"150")); ?> 
						  <?php echo $this->Form->input("CourseQuizQuestionOption.0.id",array("type"=>"hidden")); ?>
					 </li>
		
			    	  <li id="2" style="float: left;width: 100%;">
						  <?php echo $this->Form->input("CourseQuizQuestionOption.1.answer",array("class"=>"optquestion","type"=>"checkbox","label"=>"FALSE","div"=>false)); ?> 
						  <?php echo $this->Form->input("CourseQuizQuestionOption.1.options",array("class"=>"optquestionval","type"=>"hidden", "value"=>"false","div"=>false,"maxlength"=>"150")); ?>
						   <?php echo $this->Form->input("CourseQuizQuestionOption.1.id",array("type"=>"hidden")); ?>
					 </li>
		<?php  ?>
				  </ul>
	 </div>     
         
<?php } ?>		

 <!--form for fill in the blanks -->
 
<?php if($questionType == 'f') { ?>
	
	 <div class="addquestionnew">
		 
	      <div  class="textarea">
	        <label for = "CourseQuizQuestionQuestion"> Question</label>
	          <br/>
	            <?php echo $this->Form->input('question',array("type"=>"text","placeholder"=>"Enter question here","label"=>false,"div"=>false,"cols"=>"135","row"=>"10","class"=>"question")); ?>
          </div>
     
          <div id="fillquestion"> 
			  
             <em class = "tip-txt"> 
				 *Info: You can phrase these Questions like the example shown below, by adding the underscores "_" around the word that you would like to show as blank. For e.g.
				 <br>
				 This is a _good_ example of fill in the blanks.
				 <br>
				 The question will appear to the user as:
				 <br>
				 This is a __ example of fill in the blanks. and the text "good" is the answer.
             </em>
             
	       </div>
	       
	       <ul class="newoptions" style="margin-top:10px;">
			  
			  
		   </ul>
			   
	       
      </div>      
<?php } ?>		

<!--form for audio file-->

<?php if(($questionType == 'a')||($questionType == 'A')) {  //pr("hello");
	//die;?>
	
	<div class="addquestionnew">
		
			<div  class="textarea" style="margin-bottom:20px;">
	           <label for = "CourseQuizQuestionQuestion"> Question</label>
	           <br/>
	             <?php echo $this->Form->input('question',array("type"=>"text","placeholder"=>"Enter question here","label"=>false,"div"=>false,"cols"=>"135","row"=>"10","class"=>"question")); ?>
			</div>
			
	      <div  class="box">
	          <?php echo $this->Form->input('media',array("type"=>"file")); ?>
          </div>
          <?php if (isset($this->request->data['CourseQuizQuestion']['media']) && !empty($this->request->data['CourseQuizQuestion']['media'])) { //pr($this->request->data['CourseQuizQuestion']['media']); ?>
				<div class="box">

					<audio id="audiio" width="320" height="240" controls>
					  <source src="<?php echo SITE_LINK.$this->request->data['CourseQuizQuestion']['media']; ?>" type="audio/mp3">
					  <source src="<?php echo SITE_LINK.$this->request->data['CourseQuizQuestion']['media'].".ogg"; ?>" type="audio/ogg">
					  Your browser does not support the audio tag.

					</audio>
					
				
					
				</div>
			<?php } ?>
    </div>     
         
<?php } ?>		

<!--form for video file-->

<?php if($questionType == 'v') { ?>
	
	<div class="addquestionnew">
		
			<div  class="textarea" style="margin-bottom:20px;">
	           <label for = "CourseQuizQuestionQuestion"> Question</label>
	           <br/>
	             <?php echo $this->Form->input('question',array("type"=>"text","placeholder"=>"Enter question here","label"=>false,"div"=>false,"cols"=>"135","row"=>"10","class"=>"question")); ?>
	             
	             
			</div>
	 
			<div  class="box">
	           <?php echo $this->Form->input('media',array("type"=>"file")); ?>
			</div>
				<?php if (isset($this->request->data['CourseQuizQuestion']['media']) && !empty($this->request->data['CourseQuizQuestion']['media'])) { //pr($this->request->data['CourseQuizQuestion']['media']); ?>
				<div class="box">
					<video id="vid" width="320" height="240" controls>
					  <source src="<?php echo SITE_LINK.$this->request->data['CourseQuizQuestion']['media'];?>" type="video/mp4">
					  <source src="<?php echo SITE_LINK.$this->request->data['CourseQuizQuestion']['media'].".webm";?>" type="video/webm">
					  Your browser does not support the video tag.
					</video>
					
				
					
				</div>
			<?php } ?>
          
    </div>
         
<?php } ?>		

 <!--form for documents file-->

<?php if($questionType == 'd') { ?>
	
	<div class="addquestionnew">
		
			<div  class="textarea" style="margin-bottom:20px;">
	           <label for = "CourseQuizQuestionQuestion"> Question</label>
	           <br/>
	             <?php echo $this->Form->input('question',array("type"=>"text","placeholder"=>"Enter question here","label"=>false,"div"=>false,"cols"=>"135","row"=>"10","class"=>"question")); ?>
			</div>
	
			<div  class="box">
				<?php echo $this->Form->input('media',array("type"=>"file")); ?>
				<br/>			
					<em class="sml_txt_warn">
						For Documents Only we use .docs, .pdf in OpenCourseWare
					</em>	
			</div>
			<?php if (isset($this->request->data['CourseQuizQuestion']['media']) && !empty($this->request->data['CourseQuizQuestion']['media'])) {//pr($this->request->data['CourseQuizQuestion']['media']); ?>
				<div class="box">
					<iframe src="http://docs.google.com/gview?url=<?php echo SITE_LINK.$this->request->data['CourseQuizQuestion']['media']; ?>&embedded=true" style="width:100%; height:530px;" frameborder="0" id="viewer_frame">
					</iframe>
				</div>
			<?php } ?>
	</div>
     
<?php } ?>		

<!--form for true/false -->

<?php if($questionType == 'match') { ?>
	
	  <div class="addquestionnew">
		  
			<div  class="textarea" style="margin-bottom:20px;">
				<label for = "CourseQuizQuestionQuestion"> Question </label>
				  <br/>
	             <?php echo $this->Form->input('question',array("type"=>"text","placeholder"=>"Enter question here","label"=>false,"div"=>false,"cols"=>"135","row"=>"10","class"=>"question")); ?>
            </div>
			<?php echo isset($strError)?$strError:''; ?>
			        <label> Options </label>
			 <ul class="newoptions" style="margin-top:10px;"> 
				 
				 <?php if (isset($this->request->data['CourseQuizQuestionOption'])) {  ?>
						<?php foreach($this->request->data['CourseQuizQuestionOption'] as $key=>$val) { ?>
							<li id="<?php echo $key+1; ?>">
								<?php echo $this->Form->input("CourseQuizQuestionOption.".$key.".options",array("class"=>"optanswer","placeholder"=>"Enter question here","type"=>"text","label"=>false,"div"=>false)); ?> 
								<?php echo $this->Form->input("CourseQuizQuestionOption.".$key.".opt_answer",array("class"=>"optquestions","placeholder"=>"Enter answer here","type"=>"text","label"=>false,"div"=>false)); ?> 
								<?php echo $this->Form->input("CourseQuizQuestionOption.".$key.".id",array("type"=>"hidden")); ?>
							</li>
						<?php } ?>
					<?php } else { ?>
						
	              <li id="1">
					<?php echo $this->Form->input("CourseQuizQuestionOption.0.options",array("class"=>"optanswer","placeholder"=>"Enter question here","type"=>"text","label"=>false,"div"=>false)); ?> 
					<?php echo $this->Form->input("CourseQuizQuestionOption.0.opt_answer",array("class"=>"optquestions","placeholder"=>"Enter answer here","label"=>false,"type"=>"text","div"=>false)); ?>
				  </li>  
			      
	              <li id="2">
			        <?php echo $this->Form->input("CourseQuizQuestionOption.1.options",array("class"=>"optanswer","placeholder"=>"Enter question here","label"=>false,"type"=>"text","div"=>false)); ?> 
					<?php echo $this->Form->input("CourseQuizQuestionOption.1.opt_answer",array("class"=>"optquestions","placeholder"=>"Enter answer here","type"=>"text","label"=>false,"div"=>false)); ?> 
	              </li>
			      
		         <li id="3">
                    <?php echo $this->Form->input("CourseQuizQuestionOption.2.options",array("class"=>"optanswer","placeholder"=>"Enter question here","label"=>false,"type"=>"text","div"=>false)); ?> 
					<?php echo $this->Form->input("CourseQuizQuestionOption.2.opt_answer",array("class"=>"optquestions","placeholder"=>"Enter answer here","type"=>"text","label"=>false,"div"=>false)); ?> 
			     </li>
			      
			     <li id="4">
			        <?php echo $this->Form->input("CourseQuizQuestionOption.3.options",array("class"=>"optanswer","placeholder"=>"Enter question here","label"=>false,"type"=>"text","div"=>false)); ?> 
					<?php echo $this->Form->input("CourseQuizQuestionOption.3.opt_answer",array("class"=>"optquestions","placeholder"=>"Enter answer here","type"=>"text","label"=>false,"div"=>false)); ?> 
			     </li>
			    <?php } ?>
			     <li>
					<input type="button" value="Add Option" id="addnewopt" val = "<?php echo $questionType; ?>" />
					<input type="button" value="Remove Option" id="remnewopt" />
				 </li>
	         </ul>
	       
        </div> 
    <?php } ?>	
    <div class="clear"></div>
       <div class="submit">
          <?php echo $this->Form->submit("Submit",array("class"=>"addquizbtn","type"=>"submit","div"=>false)); ?>
        </div>	
        
 <?php echo $this->Form->end(); ?>
 
     </div>
<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<?php echo $this->Fck->loadlecturecontent("question"); ?>


