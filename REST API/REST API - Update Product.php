<?php
$key = 'xxxxxxxxx';
$secret = 'yyyyyyyyy';
 
$response = wp_remote_request( 
	'https://webexplorar.com/wp-json/wc/v3/products/{ Product ID here }', 
	array(
		'method' => 'PUT',
		 'headers' => array(
			'Authorization' => 'Basic ' . base64_encode( "$key:$secret" )
		),
		'body' => array(
		'regular_price' => '100.30', // just update the product price
		'name' => 'Rayband Sunglasses',
			// but we can update several parameters at the same time
		)
	)
);

if( 'OK' === wp_remote_retrieve_response_message( $response ) ) {
	$body = json_decode( wp_remote_retrieve_body( $response ) );
	echo 'The product ' . $body->name . ' has been updated';
}

?>