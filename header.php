<?php
	$config = include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>kilobyte.dn42</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/dn42info.css"/>
</head>
<body>
	<nav class="navbar navbar-default navbar-static-top" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">kilobyte.dn42</p></a>
	</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li <?php echo (basename($_SERVER["SCRIPT_FILENAME"], ".php") == "index" ? 'class="active"' : ''); ?>><a href="/">Home</a></li>
				<li <?php echo (basename($_SERVER["SCRIPT_FILENAME"], ".php") == "peers" ? 'class="active"' : ''); ?>><a href="/peers.php">Peers</a></li>
				<?php
				if($config['wireguard'] == true) {
					echo("<li ". (basename($_SERVER["SCRIPT_FILENAME"], ".php") == "tunnels" ? 'class="active"' : '') ."><a href=\"/tunnels.php\">Tunnels</a></li>");
				}
				?>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">
