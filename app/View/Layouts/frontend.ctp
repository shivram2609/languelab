<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<?php echo $this->Html->charset(); ?>
	<?php echo $this->Html->meta('icon'); ?>
	<title>
		<?php echo $title_for_layout; ?>
		<?php if ($this->params['controller'] == 'pages' && $this->params['action'] == 'index') { ?>
			<?php echo ""; ?>
		<?php } else { ?>
			<?php echo(TITLE_EXT); ?>
		<?php } ?>
	</title>
	<?php echo $this->Html->script(array('jquery.1.8.2','jquery.form','placeholder','html5')); ?>
	<?php if(($this->params['controller'] == 'courses') && ($this->params['action'] == 'view')) { ?>
		<?php echo $this->Html->css(array("style","flexslider","domtab"),NULL,array("media"=>"screen")); ?>
	<?php } else{ ?>
		<?php echo $this->Html->css(array("jquery-ui","ie8","style","flexslider","uniform.default","domtab","reset"),NULL,array("media"=>"screen")); ?>
	<?php } ?>
<!--[if IE 9]>  
<?php echo $this->Html->css(array("ie8"),NULL,array("media"=>"screen")); ?>  
<![endif]--> 
<!--[if IE 9]>  
<?php //echo $this->Html->script(array('html5')); ?>
<![endif]--> 
<script type="text/javascript">
		var SITE_LINK = "<?php echo SITE_LINK; ?>";
		var BASE_URL = "<?php echo SITE_LINK; ?>";
		var DEFAULT_LINK = "<?php echo $this->webroot; ?>";
</script>

</head>
<body>
	<div id="wrapper">
		<?php if(($this->params['controller'] == 'users' && in_array($this->params['action'],array("login","signup","forgotpassword"))) || ($this->params['controller'] == 'courses' && in_array($this->params['action'],array("viewuserquestion")))) { ?>
		<?php } else { ?>
		<?php echo $this->element("header"); ?>
		<?php } ?>
		<?php echo $content_for_layout; ?>
		<?php if($this->params['controller'] == 'pages') { /*echo $this->element("pagesection"); */ } ?>
	</div>
	<?php if($this->params['controller'] == 'users' && in_array($this->params['action'],array("login","signup","forgotpassword")) || ($this->params['controller'] == 'courses' && in_array($this->params['action'],array("viewuserquestion")))) {  ?>
		<?php echo $this->element("popupfooter"); ?>
	<?php } else { ?>
		<?php echo $this->element("frontfooter"); ?>
	<?php } ?>
				
	<script type="text/javascript" src="<?php echo $this->webroot;?>js/domtab.js"></script>
	<script type="text/javascript">
		document.write('<style type="text/css">');    
		document.write('div.domtab div{display:none;}<');
		document.write('/s'+'tyle>');    
    </script>
    
	<?php echo $this->element('sql_dump'); ?>
	
</body>
</html>
