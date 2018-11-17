<style type="text/css">

	.rma_admin {
		width: 98%;
		font-size: 15px;
    	font-family: "Open Sans", "Helvetica Neue", sans-serif;
	}
	.rma_admin ul {
		margin: 0;
		padding: 0;
		display: flex;
	}
	.rma_admin ul.title li {
		background: #797979;
		color: #fff;
		font-weight: bold;
	}
	.rma_admin ul li {
		background: #e2e2e2;
		color: #000;
		width: 100%;
		padding: 1em;
	}

</style>

<h1>RMA Tool</h1>
<div class="rma_admin">

<?php

	global $wpdb;
	$rma_table = $wpdb->prefix . "rma_request";

	if (!$_GET['rma_num']) :
		$rma_result = $wpdb->get_results( "SELECT * FROM $rma_table ORDER BY ID DESC LIMIT 10;" );
	else:
		$rma_result = $wpdb->get_results( "SELECT * FROM $rma_table WHERE rma_num = '$_GET[rma_num]';" );
	endif;

	$rma_res = json_encode($rma_result[0]);

// echo "<pre>";
// print_r($rma_res);
// echo "</pre>";

?>
	<script type="text/javascript">
		var obj = JSON.parse(JSON.stringify(' <?=$rma_res?> '));
		var parsedObj = JSON.parse(obj);
		console.log(parsedObj);
	</script>

	<ul class="title">
		<li>ID</li>
		<li>User ID / Name</li>
		<li>RMA Number</li>
		<li>Name</li>
		<li>RMA Detail</li>
		<li>Status</li>
		<li>Submit Date</li>
	</ul>

</div>
