<?
$customer_input = $_POST['input'];

include('class/parse.php');
$parse = new Parse();
$parse->input = $customer_input;
$return = $parse->parse();
echo json_encode($return);

?>