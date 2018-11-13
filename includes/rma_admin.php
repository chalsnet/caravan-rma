<?php

	global $wpdb;

	$rma_table = $wpdb->prefix . "rma_request";
	$rma_result = $wpdb->get_results( "SELECT * FROM $rma_table ORDER BY ID DESC LIMIT 10;" );
	
?>

<style type="text/css">

	.rma_admin {
		width: 98%;
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
	<ul class="title">
		<li>ID</li>
		<li>User ID</li>
		<li>RMA Number</li>
		<li>RMA Reason</li>
		<li>RMA Detail</li>
		<li>Status</li>
		<li>Requested Date</li>
	</ul>

	<?php foreach ($rma_result as $rma_key => $rma_value) { ?>
	<ul>
		<li><?=$rma_value->ID?></li>
		<li><?=$rma_value->uid?></li>
		<li><?=$rma_value->RMA_num?></li>
		<li><?=$rma_value->RMA_reason?></li>
		<li><?=$rma_value->RMA_details?></li>
		<li><a href="<?php get_permalink() . "&id=" . $rma_value->ID; ?>"><?=$rma_value->status?></a>&nbsp;</li>
		<li><?=$rma_value->date?></li>
	</ul>
	<?php } ?>

</div>