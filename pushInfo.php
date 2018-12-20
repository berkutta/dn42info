<?php 
include("config.php");

if ($_GET['key'] != "keyhier")
	die();

$birdProtocols = file_get_contents($_FILES['upload']['tmp_name']);

if($_GET['protocol'] != "wireguard") {
	$birdLines = explode("\n", $birdProtocols);
	$result = array();
	
	foreach ($birdLines as $birdLine)
	{
		// Split at space characters
		$elements = explode(" ", $birdLine);
		// Sort out all entries where strlen == 0; all empty strings
		$elements = array_filter($elements, 'strlen');
		// reorder the array keys to numerical values
		$elements = array_values($elements);
	
		$status = array_slice ( $elements , 0 , 6 );
		$detail = array_slice ( $elements , 6 ); 
		//var_dump($status);
	
		if (count($detail) != 0)
		{
			$status[6] = implode(" ", $detail);
		}
	
		if (count($status) != 0)
			$result[] = $status;
	
	}
	
	$result = array_slice ( $result , 5 ); 
	
	var_dump(count($result));

	if ($_GET['protocol'] == "ipv6")
	{
		file_put_contents("bird6.json", json_encode($result));
	}
	else
	{
		file_put_contents("bird4.json", json_encode($result));
	}
} else {
	preg_match_all('/interface: (.*)\n(  public key: (.*)\n  private key: (.*)\n  listening port: (.*)\n\npeer: (.*)\n  endpoint: (.*):(.*)\n  allowed ips: (.*)\n  latest handshake: (.*)\n  transfer. (.*)\n)?/', $birdProtocols, $tunnel_array, PREG_SET_ORDER);

	$tunnel_no = 0;
	
	foreach($tunnel_array as $tunnel) {
		$tunnels_object[$tunnel_no]['name'] = $tunnel[1];
		$tunnels_object[$tunnel_no]['listening_port'] = $tunnel[5];
		$tunnels_object[$tunnel_no]['peer_ip'] = $tunnel[7];
		$tunnels_object[$tunnel_no]['peer_port'] = $tunnel[8];
		$tunnels_object[$tunnel_no]['allowed_ips'] = $tunnel[9];
		$tunnels_object[$tunnel_no]['latest_handshake'] = $tunnel[10];
		$tunnels_object[$tunnel_no]['transfer'] = $tunnel[11];
	
		if(!empty($tunnels_object[$tunnel_no]['latest_handshake'])) {
			$tunnels_object[$tunnel_no]['status'] = true;
		} else {
			$tunnels_object[$tunnel_no]['status'] = false;
		}
	
		$tunnel_no++;
	}
	
	file_put_contents("wireguard.json", json_encode($tunnels_object));
}


?>