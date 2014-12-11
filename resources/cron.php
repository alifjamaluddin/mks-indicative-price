<?php

include_once('./html_dom.php');

include_once ('./func.php');

//Server Details
$dbUsername = "root";
$dbPassword = "toor";
$dbHost = "localhost";
$dbName = "mks_data";

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error == 1) {
    die("Connection failed: " . $conn->connect_error);
}else{
	$html = file_get_html('http://www.mks.ch/mobile/myr/v1/');

	$we_buy =  removeSpace($html->find('tr[class="L10"]', 1)->find('td[align="right"]', 0)->plaintext);

	$we_sell =  removeSpace($html->find('tr[class="L10"]', 1)->find('td[align="right"]', 1)->plaintext);

	$d_time =  formatDatetime($html->find('tr[class="L0"]', 0)->find('font.date', 0)->plaintext);

	date_default_timezone_set("Asia/Kuala_Lumpur");
	$s_time = date("Y-m-d H:i:s");

	if ($we_buy != "0.00" && $we_sell != "0.00") {
		$sql = "INSERT INTO `mks_price` (`we_buy`, `we_sell`, `data_time`, `server_time`) VALUES ('$we_buy', '$we_sell', '$d_time', '$s_time')";

		if($conn->query($sql) === TRUE){
			echo " Data added to database";
		}else{
			echo " Error: " . $sql . "&nsbp;" . $conn->error;
		}
	}else{
		$sql = "SELECT `we_buy`,`we_sell`,`data_time` FROM `mks_price` ORDER BY `id` DESC LIMIT 1";

		if($result = $conn->query($sql)){
			$row = $result->fetch_row();

			$timestamp = strtotime($row[2]);
			$data_time = date("Y-m-d h:i:s", $timestamp + 30);

			$sql = "INSERT INTO `mks_price` (`we_buy`, `we_sell`, `data_time`, `server_time`, `timeout`) VALUES ('$row[0]', '$row[1]', '$data_time', '$s_time', 'true')";

			if($conn->query($sql) === TRUE){
				echo " Data added to database";
			}else{
				echo " Error: " . $sql . "&nsbp;" . $conn->error;
			}
		}
	}

	$conn->close();
}
?>

