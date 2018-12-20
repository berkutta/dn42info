<?php
	$config = include("config.php");
	include("header.php");
?>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Contact Information</div>
					<div class="panel-body">
						<dl>
							<?php
							foreach($config['contact_info'] as $info) {
								echo("<dt>".$info['name']."</dt><dd>".$info['value']."</dd>");
							}
							?>
						</dl>
						<br/><br/>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Peering Information</div>
					<div class="panel-body">
						<dl>
						<?php
							foreach($config['peering_info'] as $info) {
								echo("<dt>".$info['name']."</dt><dd>".$info['value']."</dd>");
							}
							?>
						</dl>
						<!--<figure class="highlight"><pre><code class="language-text" data-lang="text">dfg</code></pre></figure>-->
					</div>
				</div>
			</div>
			<!--<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Active Services</div>
					<div class="panel-body">
						<dl>
							<dd>DNS</dd>
							<dt>ns1.dark-it.dn42</dt>
						</dl>
					</div>
				</div>
			</div>-->
		</div>
<?php include("footer.php"); ?>
