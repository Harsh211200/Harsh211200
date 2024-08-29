<HTML>
<BODY>
	<TABLE>
		<TH>Name</TH><TH>Surname</TH><TH>Initial</TH>
		<?php 
			// Establishing a connection to with the mySQL server
			$conn = mysqli_connect("localhost","root","");
			// Check connection
				if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
				}
				echo "Connected successfully";
				
			// Selecting the database to work with
			// remember this database must be uploaded to the server first
			mysqli_select_db($conn, "saleco") or die("Could not select database");
			// creating a Query to elicit data from the database
			$query = "Select cusLName, cusFName,cusInitial FROM tblCustomer";
			// What is $result ? explain.
			$result = mysqli_query ($conn,$query);
			 // What is MYSQLI_NUM and what does it do?
			while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
				echo "<TR><TD>$row[0]</TD><TD>$row[1]</TD><TD>$row[2]</TD></TR>";
			}//End of while
		?>
	</TABLE>
</BODY>
</HTML>
