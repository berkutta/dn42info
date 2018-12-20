<?php
	include("config.php");
	include("header.php");
	/* 
	wg | curl -X POST --form upload=@- https://dn42info.tbspace.de/pushInfo.php?key=keyhier&protocol=wireguard
	*/

	$wireguardtunnels = json_decode(file_get_contents("wireguard.json"));
?>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading">Active Wireguard Tunnels</div>
					<table class="table table-striped table-responsive table-hover">
						<thead>
							<tr>
								<th class="col-md-2" style="width: 0.133333%;">&nbsp;</th>
								<th class="col-md-2">Name</th>
								<th class="col-md-2">Peer IP</th>
								<th class="col-md-1">Peer Port</th>
								<th class="col-md-1">Listening Port</th>
								<th class="col-md-2">Allowed IP's</th>
								<th class="col-md-2">Latest Handshake</th>
								<th class="col-md-2">Transfer</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($wireguardtunnels as $tunnel)
							{
								switch ($tunnel->status) 
								{
									case true:
										$class = "success";
										break;

									case false:
										$class = "danger";
										break;
								}
						?>
							<tr>
								<td class="<?php echo $class; ?>">&nbsp;</td>
								<td><?php echo $tunnel->name; ?></td>
								<td><?php echo $tunnel->peer_ip ?></td>
								<td><?php echo $tunnel->peer_port ?></td>
								<td><?php echo $tunnel->listening_port ?></td>
								<td><?php echo $tunnel->allowed_ips ?></td>
								<td><?php echo $tunnel->latest_handshake ?></td>
								<td><?php echo $tunnel->transfer ?></td>
							</tr>
						<?php 
							}
						?>
						</tbody>
					</table>
					<div class="panel-footer">
					Updated <?php echo date("d.m.Y H:i:s", filemtime("wireguard.json")); ?>
					</div>
				</div>
			</div>
		</div>
<?php include("footer.php"); ?>