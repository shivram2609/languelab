<footer>
	<div class="footer-cont">
	<div class="social_media-sml shere-footer">
	</div><br>
		<div class="follow-us">
		
		</div>
		
</div>
	
</footer>

<?php echo $this->Html->script(array('jquery.validate','jquery.uniform','validationmessages','jquery.form','functionality','charCount')); ?>

<?php
/* code to include colorbox and jquery.ui for campaign add page only */
?>
<?php if(!$this->Session->read("Auth.User.id") ) { ?>
	<?php echo $this->Html->script("jquery.colorbox"); ?>
	<?php echo $this->Html->css("colorbox"); ?>
	<?php echo $this->Colorbox->openexternalpopup ("signin","600","540px"); ?>
	<?php echo $this->Colorbox->openexternalpopup ("signup","600","540px"); ?>
	<?php echo $this->Colorbox->openexternalpopup ("createcourse","600","540px"); ?>
	<?php echo $this->Colorbox->openexternalpopup ("createcourse1","600","540px"); ?>
	<?php echo $this->Colorbox->openexternalpopup ("createcourse12","600","540px"); ?>
	<?php echo $this->Colorbox->openexternalpopup ("createcourse13","600","540px"); ?>
	<?php echo $this->Colorbox->openexternalpopup ("createcourse14","600","540px"); ?>
	<?php echo $this->Colorbox->openexternalpopup ("mycourse","600","540px"); ?>
	<?php echo $this->Colorbox->openexternalpopups("wishlist","600","540px"); ?>
<?php } ?>



<?php
/* end of code to include colorbox and jquery.ui for campaign add page only */
?>
<?php
/* code to include colorbox and jquery.ui for campaign add page only */
?>
<?php if($this->params['controller'] == "users" && ($this->params['action'] == "confirmregisteration") ) { ?>
	<?php $url = SITE_LINK."login"; ?>
	<?php echo $this->Colorbox->openexternalpopup ("signup","70%","60%"); ?>
<?php } ?>
<?php
/* end of code to include colorbox and jquery.ui for campaign add page only */
?>
<?php
/* code to include colorbox and jquery.ui for campaign add page only */
?>
<?php if($this->params['controller'] == "userdetails" && ($this->params['action'] == "edit_profile") ) { ?>
	<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
	<?php //echo $this->Fck->remove('addtext');  ?>
	<?php //echo $this->Fck->loadextra('addtext');  ?>
	
	<?php echo $this->Fck->loadextra('UserdetailBiography');  ?>
<?php } ?>

<?php if($this->params['action'] == "editcurriculum") { ?>
<?php //echo $this->Html->script('ckeditor/ckeditor'); ?>
	<?php //echo $this->Fck->remove('addtext');  ?>
	<?php // echo $this->Fck->loadextra('addtext');  ?>
<?php } ?>

<?php if($this->params['controller'] == "courses" && ($this->params['action'] == "details") ) { ?>
	<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
	<?php echo $this->Fck->loadextra('CourseSummary');  ?>
	<?php echo $this->Html->css(array("tooltip"),NULL,array("media"=>"screen")); ?>
	<?php echo $this->Html->script('tooltip'); ?>
<?php } ?>

<?php
/* end of code to include colorbox and jquery.ui for campaign add page only */
?>



<?php if($this->params['controller'] == 'courses') { 
		echo $this->element('help-popup', array($this->data));
		echo $this->Html->script(array('jquery.ui','jquery.ui.tabs')); 

	}
	if(($this->params['controller'] == 'courses') && ($this->params['action'] == 'search')){ ?>
	<script>
		$(document).ready(function(){
				$("input, select").not('.no-uniform').uniform();
		});
		</script>
<?php
	}
?>
<?php /* End Help pop-up for Course Pages */ ?>

<?php if(($this->params['controller'] == "courses" && $this->params['action'] == "view")) { ?>
<script type="text/javascript">
			$(document).ready(function(){
				$(function() {
					var offset = $(".social-share").offset();
					var topPadding = 15;
					$(window).scroll(function() {
						if ($(window).scrollTop() > offset.top) {
							$(".social-share").stop().animate({
								marginTop: $(window).scrollTop() - offset.top + topPadding
							});
						} else {
							$(".social-share").stop().animate({
								marginTop: 0
							});
						};
					});
				});
			});
		</script>
	<?php if(($this->Session->read("Auth.User.id") && $this->Session->read("Auth.User.id") != $coursedetail['Course']['user_id']) && !isset($usercourse)) { ?>
		
		<?php echo $this->Html->script("jquery.colorbox"); ?>
		<?php echo $this->Html->css("colorbox"); ?>
		<?php //echo $this->Html->css("extra"); ?>
		<?php echo $this->Colorbox->openinlinepop("inline","302px","50%"); ?>
		
	<?php } else { ?>
		
	<?php } ?>
	<style>
@media only screen and (max-width:600px){
#colorbox{position: fixed !important; left:5% !important; top:10% !important; margin-bottom:10% !important;}
}
</style>
<?php } ?>
<?php if($this->params['action'] == 'viewlecture') { ?>
<?php } ?>
<?php if(($this->params['controller'] == "courses") && (($this->params['action'] == "gettingstarted") || ($this->params['action'] == "price"))) { ?>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#tabs').tabs();
	});
	</script>
<?php } ?>

