<?php 

require_once '../includes/networkstatus.class.php';
require_once '../config.php';

$networkstatus = new Networkstatus("");

$id = $_GET['id'];
$array;

// empty($id) retuns true :/
if($id != "" && $websites[$id] != null){
	$ping = $networkstatus->check($websites[$id]['domain'], $websites[$id]['port']);
	
	if($ping === null){
		$array = array("id" => $id, "error" => false, "online" => false);
	}else{
		$array = array("id" => $id, "error" => false, "online" => true, "ping" => $ping);
	}
}else{
	$array = array("id" => $id, "error" => true, "message" => "website '{$id}' is not found");
}

echo json_encode($array);