<?php

// Create Product with WooCommerce API 
$key = 'xxxxxxxxx';
$secret = 'yyyyyyyyy';

$response = wp_remote_post( 
	'https://webexplorar.com/wp-json/wc/v3/products', 
	array(
	 	'headers' => array(
			'Authorization' => 'Basic ' . base64_encode( "$key:$secret" )
		),
		'body' => array(
			'name' => 'My test product', // product title
			'status' => 'draft', // product status, default: publish
			'categories' => array( // product categories
				array(
					'id' => 5 // each category in a separate array
				),
				array(
					'id' => 10
				)
			),
			'regular_price' => '9.99' // product price
		)
	)
);

if( 'Created' === wp_remote_retrieve_response_message( $response ) ) {
	$body = json_decode( wp_remote_retrieve_body( $response ) );
	echo 'The product ' . $body->name . ' has been created';
}


?>