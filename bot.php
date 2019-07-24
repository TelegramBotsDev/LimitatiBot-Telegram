<?php
$api = "botYOUR_API_HERE";
include ("http.php");
global $api;

$content = file_get_contents('php://input');
$update = json_decode($content, true); 
$userID = $update[message][from][id];
$msg = $update[message][text];
$chatID = $update[message][chat][id];
$messageid = $update[message][message_id];
$replyforward = $update[message][reply_to_message][forward_from];
$rfid = $update[message][reply_to_message][forward_from][id];
include ("functions.php");

//Start bot
if($msg == "/start"){
	sm($chatID, "*Bot creato da* @Rokye2015",'','markdown');
}
//Chat Function
if($userID != YOUR_ID_HERE){
	$var = array(
		'chat_id' => YOUR_ID_HERE,
		'from_chat_id' => $chatID,
		'message_id' => $messageid);
	$richiesta = new HttpRequest("get", "https://api.telegram.org/$api/forwardMessage", $var);
}

if($replyforward and $userID == YOUR_ID_HERE){
	$id = $rfid;
	sm($id, $msg);
}