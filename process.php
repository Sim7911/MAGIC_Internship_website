<?php

echo "Hey";

	include ("db.php");	

	$msg = "";
	if(isset($_POST["submit"]))
	{
		$first_name = $_POST["fname"];
		$last_name = $_POST["lname"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$pincode = $_POST["pin"];
		$state = $_POST["state"];
		$country = $_POST["country"];
		$address = $_POST["address"];
		$username = $_POST["username"];
		$password = $_POST["Password"];

/*
		$fname = mysqli_real_escape_string($db, $fname);
		$lname = mysqli_real_escape_string($db, $lname);
		$email = mysqli_real_escape_string($db, $email);
		$pnum = mysqli_real_escape_string($db, $pnum);
		$pin = mysqli_real_escape_string($db, $pin);
		$state = mysqli_real_escape_string($db, $state);
		$country = mysqli_real_escape_string($db, $country);
		$addr = mysqli_real_escape_string($db, $addr);
		$uname = mysqli_real_escape_string($db, $uname);
		$password = mysqli_real_escape_string($db, $password);*/
		$password = md5($password);
		
		//Query
		
		$sql="SELECT email FROM sign_up WHERE email='$email'";
		
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if(mysqli_num_rows($result) == 1)
		{
			echo "<script>";

				echo "alert('Sorry...This email already exists...')";

				echo "</script>";

		}
		else
		{
			$query = mysqli_query($db, "INSERT INTO sign_up(first_name, last_name, email, phone, pincode, state, country, address, username, password) VALUES ('$first_name', '$last_name', '$email', '$phone', '$pincode', '$state', '$country', '$address', '$username', '$password')");
			if($query)
			{
				echo "<script>";

				echo "alert('Thank You! You are now registered.')";

				echo "</script>";
			}
		}
	}
?>