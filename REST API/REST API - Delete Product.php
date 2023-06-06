<?php
// Delete a Product with WooCommerce API 

$key = 'xxxxxxxxx';
$secret = 'yyyyyyyyy';


$response = wp_remote_request( 
	'https://webexplorar.com/wp-json/wc/v3/products/{PRODUCT ID}', // ?force=true
	array( 
		'method' => 'DELETE',
 		'headers' => array(
			'Authorization' => 'Basic ' . base64_encode( "$key:$secret" )
		)
	)
);

if( 'OK' === wp_remote_retrieve_response_message( $response ) ) {
	$body = json_decode( wp_remote_retrieve_body( $response ) );
	echo 'The product ' . $body->name . ' has been removed';
}

?>