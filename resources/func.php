<?php
	//$_SERVER['DOCUMENT_ROOT'] = '/root/Dropbox/html';

	include_once ($_SERVER['DOCUMENT_ROOT']."/resources/config.php");
	require ($_SERVER['DOCUMENT_ROOT']."/resources/git.php");

	function getPrice($session, $type){
		global $conn;
		if ($type == "we_buy") {
			if ($session != 1) {
				$sql = "SELECT `$type` FROM `mks_price` WHERE `id` = ((SELECT MAX(`id`) FROM `mks_price`)-$session)";
			}else{
				$sql = "SELECT `$type` FROM `mks_price` WHERE `id` = (SELECT MAX(`id`) FROM `mks_price`)";
			}

			if ($result = $conn->query($sql)) {
				$row = $result->fetch_row();
				echo $row[0];
			}
		}elseif ($type == "we_sell") {
			if ($session != 1) {
				$sql = "SELECT `$type` FROM `mks_price` WHERE `id` = ((SELECT MAX(`id`) FROM `mks_price`)-$session)";
			}else{
				$sql = "SELECT `$type` FROM `mks_price` WHERE `id` = (SELECT MAX(`id`) FROM `mks_price`)";
			}

			if ($result = $conn->query($sql)) {
				$row = $result->fetch_row();
				echo $row[0];
			}
		}
	}	

	function getTime(){
		global $conn;
		$sql = "SELECT `server_time` FROM `mks_price` WHERE `id` = (SELECT MAX(`id`) FROM `mks_price`)";

		if ($result = $conn->query($sql)) {
			$row = $result->fetch_row();
			$time = $row[0];
			date_default_timezone_set('Asia/Kuala_Lumpur');
			echo date("g:i A l, jS F, Y", strtotime($time));

		}
	}

	function getStats($session, $type){
		global $conn;
		$sql_session = "SELECT `$type` FROM `mks_price` WHERE `id` = (SELECT MAX(`id`) FROM `mks_price`)";
		$sql_previous = "SELECT `$type` FROM `mks_price` WHERE `id` = ((SELECT MAX(`id`) FROM `mks_price`)-$session)";
		
		if (($result_session = $conn->query($sql_session)) && ($result_previous = $conn->query($sql_previous))) {
			$row_session = $result_session->fetch_row();
			$row_previous = $result_previous->fetch_row();
			
			$session_price = $row_session[0];
			$previous_price = $row_previous[0];
		}
		if ($type == "we_buy") {
			if ($session_price > $previous_price) {
				echo "\"glyphicon glyphicon-chevron-up\"";
			}elseif ($session_price < $previous_price) {
				echo "\"glyphicon glyphicon-chevron-down\"";
			}elseif ($session_price = $previous_price) {
				echo "\"glyphicon glyphicon-stop\"";
			}
		}elseif ($type == "we_sell") {
			if ($session_price > $previous_price) {
				echo "\"glyphicon glyphicon-chevron-up\"";
			}elseif ($session_price < $previous_price) {
				echo "\"glyphicon glyphicon-chevron-down\"";
			}elseif ($session_price = $previous_price) {
				echo "\"glyphicon glyphicon-stop\"";
			}
		}
	}

	function removeSpace($data){
	return number_format((float)round(preg_replace("/\s/", "", $data)/1000, 2), 2, '.', '');
	}

	function formatDatetime($data){
		return preg_replace("/CET/", "", $data);
	}

?>