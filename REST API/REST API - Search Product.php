<?php
// Search Products with WooCommerce API 

$key = 'xxxxxxxxx';
$secret = 'yyyyyyyyy';


$response = wp_remote_get(
	add_query_arg( 
		array( 'sku' => $sku ), 
		'https://webexplorar.com/wp-json/wc/v3/products'
	),
	array(
		'headers' => array(
			'Authorization' => 'Basic ' . base64_encode( "$key:$secret" )
		)
	)
);

if( 'OK' === wp_remote_retrieve_response_message( $response ) ) {
	// now we have an array of products found
	$products = json_decode( wp_remote_retrieve_body( $response ) );
	// but probably it is the only product because we are searching by SKU
	$product = reset( $products );
	if( 'variation' === $product->type ) {
		echo 'Variation found with ID: ' . $product->id;
	} else {
		echo 'Product found with ID: ' . $product->id;
	}
}

?>
