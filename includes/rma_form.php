<?php

$featured_image = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );

if ($_POST) {

	echo "<pre>";
	print_r($_POST);
	echo "</pre>";

	$new_rma = str_split(substr(time(), 4), 3);
	$rma_num = $new_rma[0] . "-" . $new_rma[1];
	$uid = get_current_user_id();

	print_r($new_rma);
	print_r("<br>");
	print_r($_SERVER['REMOTE_ADDR']);

	global $wpdb;
	$rma_table = $wpdb->prefix . "rma_request";

	$db_insert = $wpdb->insert( 
		$rma_table, 
		array(
			'rma_num' => $rma_num,
			'status' => "Pending",
			'uid' => $uid,
			'submitter_ip' => $_SERVER['REMOTE_ADDR'],
			'name' => $_POST['fname'] . " " . $_POST['lname'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'addr1' => $_POST['addr1'],
			'addr2' => $_POST['addr2'],
			'city' => $_POST['city'],
			'state' => $_POST['state'],
			'zip' => $_POST['zip'],
			'country' => $_POST['country'],
			'desc_issue' => $_POST['desc_issue'],
			'attachment_1' => $_POST['attachment_1'],
			'attachment_2' => $_POST['attachment_2']
		), 
		array( 
			'%s', //rma_num
			'%s', //status
			'%d', //uid
			'%d', //submitter_ip
			'%s', //name
			'%s', //email
			'%s', //phone
			'%s', //addr1
			'%s', //addr2
			'%s', //city
			'%s', //state
			'%s', //zip
			'%s', //country
			'%s', //desc_issue
			'%s', //attachment_1
			'%s', //attachment_2
		)
	);

}

?>

<style type="text/css">
	.rma_form {
		width: 50em;
		border: 1px solid;
	}
	.rma_form ul li {
		list-style: none;
	}
	.rma_form .columns {
		width: 49%;
		display: inline-block;
	}
	.rma_form ul li, .rma_form input {
		width: 100%;
	}
</style>

<form method="POST">
	<div class="rma_form">
		<ul>
			<li class="columns">
				<label>First Name</label>
				<input type="text" name="fname">
			</li>
			<li class="columns">
				<label>Last Name</label>
				<input type="text" name="lname">
			</li>
			<li>
				<label>E-mail</label>
				<input type="text" name="email">
			</li>
			<li>
				<label>Phone</label>
				<input type="text" name="phone">
			</li>
			<li>
				<label>Address 1</label>
				<input type="text" name="addr1">
			</li>
			<li>
				<label>Address 2</label>
				<input type="text" name="addr2">
			</li>
			<li>
				<label>City</label>
				<input type="text" name="city">
			</li>
			<li>
				<label>State</label>
				<input type="text" name="state">
			</li>
			<li>
				<label>Zip</label>
				<input type="text" name="zip">
			</li>
			<li>
				<label>Country</label>
				<input type="text" name="country">
			</li>
			<li>
				<label>Description</label>
				<textarea name="desc_issue"></textarea>
			</li>
			<li>
				<label>Attachment 1</label>
				<input type="file" name="attachment_1">
			</li>
			<li>
				<label>Attachment 2</label>
				<input type="file" name="attachment_2">
			</li>
			<li>
				<button>Submit</button>
			</li>
		</ul>

	</div>	
</form>