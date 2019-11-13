<?php
	session_start();
?>
<?php 
	include 'dbconnection.php';
	 
	// Check connection
    // if (!$conn) {
        // die("Connection failed: " . mysqli_connect_error());
    // }
    // echo "Connected successfully";
    
	if (isset($_POST["user"])&& isset($_POST["pass"]))
	{	
		
		$username = $_POST["user"];
		$password = $_POST["pass"];
		
		$sql = "select namaPegawai from pegawai where emailPegawai='$username' and password='$password'";
		$result = mysqli_query($conn, $sql); 
		 
		if ($result) 
		{ 
			if(mysqli_num_rows($result)>0) {
				$namapegawai = '';
				while($row = mysqli_fetch_assoc($result)) {
					$namapegawai = $row["namaPegawai"];
				}
				$_SESSION["user"] = $namapegawai;
				echo $namapegawai;
				// header("Location: dashboard.php");
			} else {
				echo '999';
			}
			// close the result. 
			mysqli_free_result($result); 
		} else {
			echo '999';
		}
		mysqli_close($conn);
	}
	
	if (isset($_POST["viewleads"]))
	{	
		$response = array();
		
		$sql = "SELECT A.idLeads, B.namaContact, B.namaPerusahaan, C.namaProduct, A.tglStatusLeads, A.channel, A.contactBy, D.namaPegawai FROM leads A, contact B, product C, pegawai D where A.idContact=B.idContact and A.idProduct=C.idProduct and A.idPegawai=D.idPegawai  ";
		$result = mysqli_query($conn, $sql); 
		 
		if ($result) 
		{ 
			if(mysqli_num_rows($result)>0) {
				while($row = mysqli_fetch_assoc($result)) {
					$h['id']=$row["idLeads"];
					$h['name']=$row["namaContact"];
					$h['company']=$row["namaPerusahaan"];
					$h['order']=$row["namaProduct"];
					$h['orderdate']=$row["tglStatusLeads"];
					$h['channel']=$row["channel"];
					$h['note']=$row["contactBy"];
					$h['status']=$row["namaPegawai"];
					array_push($response, $h);
				}
				echo json_encode($response);
			} else {
				echo '999';
			}
			// close the result. 
			mysqli_free_result($result); 
		} else {
			echo '999';
		}
		
		mysqli_close($conn);
	}
	
	if (isset($_POST["deleteleads"]))
	{	
		$idLeads = $_POST["deleteleads"];
		$response = array();
		
		$sql = "DELETE FROM leads WHERE leads.idLeads = ".$idLeads;
		$result = mysqli_query($conn, $sql); 
		 
		if ($result) 
		{ 
			echo 'ok';
		} else {
			echo '999';
		}
		mysqli_close($conn);
	}
?>