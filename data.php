<?php 
	require 'dbconnect.php';

	if(isset($_POST['chid'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM list WHERE chassis_id = " . $_POST['chid']);
		$stmt->execute();
		$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($details);
	}

	function loadChassis() {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM chassis");
		$stmt->execute();
		$chassis = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $chassis;
	}

 ?>