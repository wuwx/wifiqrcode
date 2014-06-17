<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>WifiQRCode</title>
	<?php echo link_tag('assets/css/bootstrap.min.css'); ?>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">WifiQRCode</a>
			</div>
		</div>
	</nav>
    
	<div class="container">
		<?php echo img(array(
			'src'   => "codegenerator?text=$code_text",
			'style' => 'max-width: 100%;',
		), TRUE); ?>
		
		<div class="alert alert-warning">
			请联系主人扫描二维码进行网络访问授权
		</div>
	
	</div>

	<footer>
		<div class="container">
			<hr />
			东北大学网络中心
		</div>
	</footer>

</body>
</html>
