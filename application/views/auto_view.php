<html>
	<head>
		<link href="<?=base_url();?>assets/autocomplete/jquery-ui.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="<?=base_url();?>assets/autocomplete/jquery.min.js"></script>
		<script type="text/javascript" src="<?=base_url();?>assets/autocomplete/jquery-ui.js"></script>
		<script type="text/javascript">
			$(function(){
			  $("#user").autocomplete({
			    source: "<?=site_url()?>/user/getusercomp" // path to the get_birds method
			  });
			});
		</script>
	</head>
	<body>
		<input type="text" id="user" name="user[]" />
	</body>
</html>