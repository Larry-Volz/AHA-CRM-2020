<?php
// Assign $postcode the $_POST['zip'] value
$postcode = $_POST['zip'];

// Get the first character of the Zipcode
$postcode1 = substr($postcode,0,1);

// Get the first 2 characters of the Zipcode
$postcode2 = substr($postcode,0,2);

// Get the first 3 characters of the Zipcode
$postcode3 = substr($postcode,0,3);

// Get the first 4 characters of the Zipcode if zip is more than 7 characters 
IF(strlen($postcode) == 5)
{
	$postcode4 = substr($postcode,0,5);
}
ELSE
{
	$postcode4 = $postcode3;
}


// Query the database for the most complete Post code it can find
$query = "SELECT lng,lat,name,state FROM `data_usa` WHERE postcode='" . $postcode4 . "' OR postcode='" . $postcode3 . "' OR postcode='" . $postcode2 . "' OR postcode='" . $postcode1 . "' ORDER BY length(postcode) desc LIMIT 1";

// Perform the Query
$query_result = @mysql_query ($query) OR die(mysql_error());

// Fetch Array of postcode information
while ($info = @mysql_fetch_array($query_result))
{

	// Latitude
	$x1 = $info['lng'];
	
	// Longtitude
	$y1 = $info['lat'];
	
	// Place Name
	$place1 = $info['name'];
	
}

// Initaliate the stores array
$stores = array();

// Only do the following if we have an latitude and longitude
IF( (isset($x1)) AND (isset($y1)) )
{
	
	// Set counter to 0 for address aray
	$counter = 0;
	
	// Get stores within $radius
	$query = "SELECT id,f_name,l_name,company,address1,address2,address3,prim_tel,lng,lat FROM data_usa, affiliates WHERE  postcode = postcode and (POW((69.1*(lng-" .  $x1. ")*cos(" . $x1 . "/57.3)),\"2\")+POW((69.1*(lat-" . $y1 . ")),\"2\"))<(" . $store_radius . "*" . $store_radius . ")";

	// Perform the query
	$query_result = @mysql_query ($query) OR die(mysql_error());
	
	// Fetch Array of store information
	while ($info = @mysql_fetch_array($query_result))
	{
	
		$query2 = "SELECT * FROM stores_custom WHERE store_id='" . $info['id'] . "' LIMIT 1";
		$query_result2 = @mysql_query ($query2) OR die(mysql_error());
		$info2 = @mysql_fetch_array($query_result2);
	
		// Add 1 to the counter each time around
		$counter = $counter + 1;
		
		// Address1-3
		$stores[$counter]['address1'] = $info['address1'];
		$stores[$counter]['address2'] = $info['address2'];
		$stores[$counter]['address3'] = $info['address3'];		
		
		foreach ($info2 as $key => $value) 
		{
			$custom[$counter][$key] = $value;
		}	

		// Area Name
		$stores[$counter]['area'] = $info['area'];
		
		// Telephone Number
		$stores[$counter]['prim_tel'] = $info['prim_tel'];
		
		
		// f_names
		$stores[$counter]['f_name'] = $info['f_name'];		
		
		// l_names	
		$stores[$counter]['l_name'] = $info['l_name'];		
		
		// companies
		$stores[$counter]['company'] = $info['company'];		
		
		// id_numbers
		$stores[$counter]['id'] = $info['id'];									
		
		// Get the distance from your postcode to the store
		$stores[$counter]['distance'] = calculate_distance($x1,$y1,$info['lng'],$info['lat']);

		
		
	}
}

IF(count($stores) == 0)
{

	// Open the results.html template file
	$page = new HtmlTemplate ('templates/'.$tpl_name.'/no_results.html');
	
	// Output the page
//	$page->CreatePageEcho();//******* THINK ABOUT THIS... NOT CORRECT VARIABLES
//*********************************** SET UP WITH 2-DIMENSIONAL ARRAY?  OR WITHING 'WHILE LOOP'
//LIKE FOR ($i=0;$i=$counter;$i++){
//echo $stores[$i][f_name];   etc.


	
}
ELSE
{

	// Open the results.html template file
	$page = new HtmlTemplate ('templates/'.$tpl_name.'/results.html');
	
	// Initiate the $stores variables
	$stores_content = '';
	
	foreach ($stores as $key => $value) 
	{
	
		// Open the shops.html template file
		$store_info = new HtmlTemplate ('templates/'.$tpl_name.'/shops.html');
		
		// Show Distance
		$store_info->SetParameter ('DISTANCE', $value['distance']);

		// Show Town
		$store_info->SetParameter ('TOWN', $value['area']);
		
		// Show Address
		$store_info->SetParameter ('FULL_ADDRESS', $value['address']);
		
		// Show Telephone
		$store_info->SetParameter ('TELEPHONE', $value['telephone']);
		
		IF(isset($custom))
		{
			foreach ($custom[$key] as $key2 => $value2) 
			{
					$store_info->SetParameter ('CUSTOM_' . strtoupper($key2), $value2);
			}
		}
		
		// Return the page
		$stores_content.= $store_info->CreatePageReturn();
	
	}
	
	// Output the Postcode entered by the user
	$page->SetParameter ('ZIP', $_POST['zip']);
	
	// Output the Store Radius
	$page->SetParameter ('RADIUS', $store_radius);
	
	// Output the store information to the results template
	$page->SetParameter ('RESULTS', $stores_content);
	
	// Output the page
	$page->CreatePageEcho();

}
?>