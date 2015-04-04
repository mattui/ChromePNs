<?php
if (!isset($_GET['s']) || empty($_GET['s'])) echo "Missing subscription id"; die();

$data = array('registration_ids' => array());
$data['registration_ids'][] = $_GET['s'];
$data_string = json_encode($data);

$ch = curl_init('https://android.googleapis.com/gcm/send');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: key=AIzaSyBPBmQNMMqBAlqSr9l8Gn9kXBO3mbNEKc4',
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);
 
$result = curl_exec($ch);
echo("$result\n");
?>
