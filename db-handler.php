<?php

	require 'db-connect.php';
	

	$connection = new DB_Connect();

	if(isset($_GET['button'])){

		$button = $_GET['button'];
		
		 if($button == 'Add'){
			$fname = isset($_GET['Fname']) ? $_GET['Fname'] : '';
			$lname = isset($_GET['Lname']) ? $_GET['Lname'] : '';
			$address = isset($_GET['Address']) ? $_GET['Address'] : '';
			$city = isset($_GET['City']) ? $_GET['City'] : '';
			$state = isset($_GET['State']) ? $_GET['State'] : '';
			$zip = isset($_GET['Zip']) ? $_GET['Zip'] : '';
			$phone = isset($_GET['Phone']) ? $_GET['Phone'] : '';
			$email = isset($_GET['Email']) ? $_GET['Email'] : '';
			$gender = isset($_GET['Gender']) ? $_GET['Gender'] : '';
			

			$sql = 'INSERT INTO members (fname, lname, address, city, state, zip, phone, email, gender) VALUES (:fn,:ln,:ad,:ct,:st,:zp,:ph,:em,:gd)';
			$connection->query($sql);
			$connection->bind(':fn', $fname);
			$connection->bind(':ln', $lname);
			$connection->bind(':ad', $address);
			$connection->bind(':ct', $city);
			$connection->bind(':st', $state);
			$connection->bind(':zp', $zip);
			$connection->bind(':ph', $phone);
			$connection->bind(':em', $email);
			$connection->bind(':gd', $gender);
			$connection->execute();

		}
		elseif($button == 'Search'){
			$fname = isset($_GET['Fname']) ? $_GET['Fname'] : '';
			$lname = isset($_GET['Lname']) ? $_GET['Lname'] : '';

			if ($Filter == "First Name") {
				$sql = "SELECT * from members where fname LIKE :value order by fname"; 
			}
			else if ($Filter == "Last Name") {
				$sql = "SELECT * from members where lname LIKE :value order by fname";
			}

			$connection->query($sql);
			$connection->bind(':value', $FilterVal); 

			$recordset = $connection->resultset();  	

			if ($recordset == null) {
				print json_encode("");
			}
			else{
				print json_encode($recordset);
			}
		}
	}