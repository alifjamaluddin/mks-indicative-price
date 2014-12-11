<?php
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
	$data = file_get_contents("http://api.import.io/store/data/417566c3-376f-4ba0-a614-c12b47a393db/_query?input/webpage/url=http%3A%2F%2Fwww.mks.ch%2Fmobile%2Fmyr%2Fv1%2F&_user=c578e8b1-4a72-4b53-ba11-a99d05580189&_apikey=QPOvhNrJHwaxmcFmvn7czes9mxY%2FhYOeD9QoNgWc%2FkyaWAndTJ7RLi0xaUl9NfGwL%2FiV%2Bs0OGDZtd3Vawz1SAw%3D%3D");

	$data = json_decode($data);

	$we_buy = $data->results[0]->we_buy;
	$we_buy = number_format((float)round(preg_replace("/\s/", "", $we_buy)/1000, 2), 2, '.', '');
	echo "We Buy : RM" . $we_buy . "/g";

	$we_sell = $data->results[0]->we_sell;
	$we_sell = number_format((float)round(preg_replace("/\s/", "", $we_sell)/1000, 2), 2, '.', '');
	echo " We Sell : RM" . $we_sell . "/g";

	$d_time = $data->results[0]->time;
	echo " Data Time : " . $d_time;

	date_default_timezone_set("Asia/Kuala_Lumpur");
	$s_time = date("Y-m-d H:i:s");
	echo " Server Time : " . $s_time;

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

