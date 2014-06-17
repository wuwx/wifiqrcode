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
	  
		<form method="POST" role="form">
			<div class="form-group">
				<label for="remote_addr">访客IP地址</label>
				<input type="text" class="form-control" id="remote_addr" value="<?php echo $remote_addr ?>">
			</div>
			<div class="form-group">
				<label for="mac_address">访客MAC地址</label>
				<input type="text" class="form-control" id="mac_address" value="<?php echo $mac_address ?>">
			</div>
			<div class="form-group">
				<label for="timestamp">本次请求时间</label>
				<input type="text" class="form-control" id="timestamp" value="<?php echo date("m-d H:i:s", $timestamp) ?>">
			</div>
			<div class="form-group">
				<label for="timeout">授权时长设置</label>
				<div class="radio">
					<label><input type="radio" name="timeout" id="timeout3600" value="3600" checked> 无流量后1小时后断线</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="timeout" id="timeout14400" value="14400"> 允许网络访问4小时</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="timeout" id="timeout32400" value="32400"> 允许网络访问9小时</label>
				</div>
		  </div>
		  <button class="btn btn-primary btn-lg btn-block">允许访问</button>
	  </form>
	
	</div>

	<footer>
		<div class="container">
			<hr />
			东北大学网络中心
		</div>
	</footer>
</body>
</html>
