<?
$customer_input = $_POST['input'];




if(preg_match('/([a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+)/i', $customer_input, $m)){
	$email = $m[1];
	$customer_input = str_replace($email, '', $customer_input);
}
if(preg_match('/((\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4})/', $customer_input, $m)){
	$phone = $m[1];
	$customer_input = str_replace($phone, '', $customer_input);
}

if(preg_match('/((([R].+)|\d+).+\d{5})/i', $customer_input, $m)){
	$address = $m[1];
	$customer_input = str_replace($address, '', $customer_input);
}

$name = $customer_input;

$return = array(
	'name' => trim($name),
	'email' => trim($email),
	'phone' => trim($phone),
	'address' => trim($address)
);

echo json_encode($return);

?>