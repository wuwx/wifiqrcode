<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>WifiQRCode</title>
	<?php echo link_tag('assets/css/bootstrap.min.css'); ?>
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
		<?php if ($message = $this->session->flashdata('success')) { ?>
			<div class="alert alert-success"><?php echo $message; ?></div>
		<?php } ?>
	</div>

	<footer>
		<div class="container">
			<hr />
			东北大学网络中心
		</div>
	</footer>
</body>
</html>
